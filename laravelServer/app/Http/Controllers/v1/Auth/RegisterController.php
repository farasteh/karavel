<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class RegisterController extends Controller
{
    public function  register(Request $request)
    {
//        dd($request->all());
//       $data = $request->user->validate([
//            'name' => 'required|max:55',
//            'user[mobile]' => 'required',
//            'user[password]' => 'required|max:8'
//       ]);
//        dd($request->body['scope']);


        $user = User::create([
            'name'      => $request->user['name'],
            'mobile'    => $request->user['mobile'],
            'password'  => bcrypt($request->user['password']),
        ]);

        $request->request->add(['scope'=>$request->body['scope']]);
        $tokenRequest = Request::create(
            '/oauth/token',
            'post'
        );
        Route::dispatch($tokenRequest);
        $success['token'] = $user->createToken('IranTech',[$request->body['scope']])->accessToken;

       return response([ 'data' => ['success' => true , 'massage' => __('auth.user.register.massage_true'), 'user' => $user, 'access_token' => $success]] , Response::HTTP_OK);
    }
}
