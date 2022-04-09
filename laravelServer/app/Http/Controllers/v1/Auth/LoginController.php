<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\Active_code;
use App\Models\BaseResume;
use App\Models\Company;
use App\Models\User;
use App\Notifications\Auth\SMS\RegisterNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;


class LoginController extends Controller
{
    public function login(Request $request)
    {
//        dd($request);
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        if(!auth()->attempt($data)){
            return response(['data' => ['success' => false,'massage' => __('auth.user.login.massage')]],403);
        }

        $user  = Auth::user();


        if($user->blocked_until != null){
            return response()->json(['data' => ['success' => false,'massage' => __('auth.user.blocked.massage')]], 403);
        }


        $request->request->add(['scope'=>$request->scope]);
        $tokenRequest = Request::create(
            '/oauth/token',
            'post'
        );
        Route::dispatch($tokenRequest);
//        dd($request->scope);
        $success['token'] = $user->createToken('IranTech',[$request->scope])->accessToken;
          if($request->scope == 'Company'){
             $data = Company::where('user_id',$user->id)->first();
              if( !$data ){
                  return response()->json(['data' => ['massage' => 'incomplete','token'=> $success,'role'=>$request->scope]], 200);
              }
          }

          if($request->scope == 'Member'){
              $data = BaseResume::where('user_id',$user->id)->first();
              if( !$data ){
                  return response()->json(['data' => ['massage' => 'incomplete','token'=> $success,'role'=>$request->scope]], 200);
              }
          }
        return response()->json(['data' => ['massage' => 'success','token'=> $success,'role'=>$request->scope]], 200);

    }


    /**
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function autoLoginCompany($token): \Illuminate\Http\JsonResponse
    {
        $user = User::where('token' , $token)->first();

        if(!empty($user) && $user->token_at != null){

            if (checkDate_lte($user->token_at) != false){

                $tokenRequest = Request::create('/oauth/token', 'post');
                Route::dispatch($tokenRequest);
                $success['token'] = $user->createToken('IranTech',['Company'])->accessToken;

                return response()->json(['data' => ['success' => true , 'massage' => __('auth.user.token.massage_success'),'token'=> $success,'role'=>'Company']], 200);
            }
        }

        return response()->json(['data' => ['error' => true , 'massage' => __('auth.user.token.massage_error')]], 403);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkMobile(Request $request): \Illuminate\Http\JsonResponse
    {

        session(['token' => createToken(), 'scope' => $request->scope ]);

        if(User::where('mobile' , $request->mobile )->first()){
            session([ 'type' => 'login']);
            return response()->json(['data' => ['success' => true , 'body' => session()->all() ]], 200);
        }

        try {
            $code = random_code();
            Active_code::create([
                'token'   => session()->get('token'),
                'mobile'  => $request->mobile,
                'code'    => $code,
                'time_at' => Carbon::now()->addMinutes(4),
            ]);
            session(['type' => 'register']);
            $dataSMS = ['mobile' => $request->mobile , 'code' => $code];
            Notification::send('sadas',new RegisterNotification($dataSMS));
            return response()->json(['data' => ['success' => true , 'body' => session()->all() ]], Response::HTTP_OK);

        }catch (\Exception $e){

            return response()->json(['data' => ['error' => true , 'massage' => __('massage.error_db') ]], Response::HTTP_INTERNAL_SERVER_ERROR);

        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function CheckCode(Request $request): \Illuminate\Http\JsonResponse
    {
       $data = Active_code::whereCode($request->code_sms)->where('token' , $request->token )->where('time_at' , '>' , now())->first();
       if($data){

           return response()->json(['data' => ['success' => true , 'mobile' =>  $data->mobile, 'massage' => __('auth.user.check_mobile.massage_true_send') , 'verifyMobile' => true]], Response::HTTP_OK);
       }
        return response()->json(['data' => ['error' => true , 'massage' => __('auth.user.check_mobile.massage_false_send') ]], Response::HTTP_BAD_REQUEST);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function LoginUser(Request $request)
    {
        $data = ['mobile' => $request->user['mobile'] , 'password' => $request->user['password']];
        if(!auth()->attempt($data)){
            return response(['data' => ['success' => false,'massage' => __('auth.user.login.massage')]],403);
        }
        $user             = Auth::user();

        if($user->blocked_until != null){
            return response()->json(['data' => ['success' => false,'massage' => __('auth.user.blocked.massage')]], 403);
        }


        $request->request->add(['scope'=>$request->body['scope']]);
        $tokenRequest = Request::create(
            '/oauth/token',
            'post'
        );
        Route::dispatch($tokenRequest);
        $success['token'] = $user->createToken('IranTech',[$request->body['scope']])->accessToken;
        if($request->scope == 'Company'){
            $data = Company::where('user_id',$user->id)->first();
            if( !$data ){
                return response()->json(['data' => ['massage' => 'incomplete','token'=> $success,'role'=>$request->body['scope']]], 200);
            }
        }

        if($request->scope == 'Member'){
            $data = BaseResume::where('user_id',$user->id)->first();
            if( !$data ){
                return response()->json(['data' => ['massage' => 'incomplete','token'=> $success,'role'=>$request->body['scope']]], 200);
            }
        }
        return response()->json(['data' => ['massage' => 'success','token'=> $success,'role'=>$request->body['scope']]], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendSMS(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = random_code();
        Active_code::create([
            'token'   => $request->body['token'],
            'mobile'  => $request->user['mobile'],
            'code'    => $code,
            'time_at' => Carbon::now()->addMinutes(4),
        ]);

        $dataSMS = ['mobile' => $request->user['mobile'] , 'code' => $code];
        Notification::send('sadas',new RegisterNotification($dataSMS));
        return response()->json(['data' => ['success' => true , 'body' => $code ]], Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginSMS(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = Active_code::whereCode($request->code_sms)->where('token' , $request->token['token'] )->where('time_at' , '>' , now())->first();
        if($data){
            $user = User::where('mobile' , $data->mobile)->first();

            if(!$user){

                return response(['data' => ['success' => false,'massage' => __('auth.user.login.massage')]],403);
            }


            if($user->blocked_until != null){
                return response()->json(['data' => ['success' => false,'massage' => __('auth.user.blocked.massage')]], 403);
            }


            $request->request->add(['scope'=>$request->token['scope']]);
            $tokenRequest = Request::create(
                '/oauth/token',
                'post'
            );
            Route::dispatch($tokenRequest);
            $success['token'] = $user->createToken('IranTech',[$request->token['scope']])->accessToken;
            if($request->scope == 'Company'){
                $data = Company::where('user_id',$user->id)->first();
                if( !$data ){
                    return response()->json(['data' => ['massage' => 'incomplete','token'=> $success,'role'=>$request->token['scope']]], 200);
                }
            }

            if($request->scope == 'Member'){
                $data = BaseResume::where('user_id',$user->id)->first();
                if( !$data ){
                    return response()->json(['data' => ['massage' => 'incomplete','token'=> $success,'role'=>$request->token['scope']]], 200);
                }
            }
            return response()->json(['data' => ['massage' => 'success','token'=> $success,'role'=>$request->token['scope']]], 200);

        }
        return response()->json(['data' => ['error' => true , 'massage' => __('auth.user.check_mobile.massage_false_send') ]], Response::HTTP_BAD_REQUEST);

    }
}
