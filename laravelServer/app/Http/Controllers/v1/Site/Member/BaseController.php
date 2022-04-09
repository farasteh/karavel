<?php

namespace App\Http\Controllers\v1\Site\Member;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\User\User;
use App\Models\Advertising;
use App\Models\Company;
use App\Notifications\company\ResumeNotification;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use App\Http\Resources\v1\Site\Member\Base as BaseResource;
use App\Http\Requests\BaseResume as BaseResumeRequest;
use App\Models\BaseResume;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response;
use App\Notifications\company\SMS\ResumeSentNotification;

class BaseController extends Controller
{


    public function index()
    {
        return new BaseResource(BaseResume::where('user_id',auth()->user()->id)->first());
    }

    public function store($id , Request $request  )  {

        $user = Advertising::with(['company'])->find($request->advertising)->loadMorph('company' , [ Company::class => ['user'] ]);
        $base = BaseResume::find($id);
        $check = $base->advertizings()->find($request['advertising']);
        $money = $request->money;

        if($check == null)
        {
            DB::beginTransaction();

            try {

                $base->advertizings()->attach([$request['advertising'] => [ 'money' => $money , 'file' => $request->file]]);

                $data = [
                    'status'             => 1 ,
                    'comment'            => '',
                    'Companycomment'     => '',
                    'advertising'        => $request->advertising ,
                    'base_resume'        =>  $id,
                    'created_at'         => Carbon::now()
                ];
                DB::table('resume_status_lists')->insert($data);

                //save file in base resume table
              //  if($request->file){$base->update(['file' => $request->file]);}

                DB::commit();
//                insertTokenUser($user->company->user->id);
//                Notification::send( $user->company->user, new ResumeNotification($base));

                $dataSMS = ['mobile' => $user->company->user->mobile , 'advertising_title' => $user->title ];
                Notification::send('sadas',new ResumeSentNotification($dataSMS));


                return response()->json([ 'data' => [ 'success' => true, 'message' => __('massage.success_db') ]], 200 );
            }catch (\Exception $e){
                DB::rollBack();
                return response()->json([ 'data' => [ 'error' => true, 'message' => __('massage.error_db') ]], 500 );
            }
        }

    }

    public  function download(){
        $base = BaseResume::where('user_id',auth()->user()->id)->first() ;
        $file= public_path(). "/pdfs/resume/" . $base->file;
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, $base->file, $headers);
    }
}
