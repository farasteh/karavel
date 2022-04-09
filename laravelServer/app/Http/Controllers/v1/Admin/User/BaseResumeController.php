<?php

namespace App\Http\Controllers\v1\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Admin\User\users\resumeCollection;
use App\Models\Advertising;
use App\Models\BaseResume;
use App\Models\ResumeSmsLog;
use App\Models\SmsLog;
use App\Notifications\company\SMS\RemindSMSNotification;
use App\Notifications\company\SMS\ResumeSentNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\v1\Admin\User\users\baseResumesCollection ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use \App\Notifications\Member\SMS\RemindSMSNotification as ResumeRemindSMS;

class BaseResumeController extends Controller
{

    public function getUser() {
        $resumes = BaseResume::orderBy('created_at' , 'desc')->get();
        return new  baseResumesCollection($resumes) ;
    }
    public function getResumes() {
        $resumes = DB::table('advertizing_resumes')->get();
        return new resumeCollection($resumes) ;
    }

    public function remindSMS(Request $request) {
        try {
            $advertising = Advertising::find($request->advertising);
            $company  = $advertising->company;
            $message  = 'آژانس " ' . $company->name . ' "، برای آگهی های شما تعدادی رزومه ارسال شده، از طریق وبسایت آن ها را بررسی کنید . باتشکر ' . ' karavel.ir ' ;
            SmsLog::create([
                'user_id'   =>  $company->user->id,
                'advertising_id'  => $advertising->id,
                'base_id'          => $request->base_resume
            ]);

            $dataSMS = ['mobile' => $company->user->mobile , 'company' => $company->name , 'message' => $message];
            Notification::send('sadas',new RemindSMSNotification($dataSMS));
            return response()->json([ 'data' => [ 'success' => true, 'message' => __('massage.success_db') ]], 200 );
        }catch (\Exception $e){
            return response()->json([ 'data' => [ 'error' => true, 'message' => __('massage.error_db') ]], 500 );
        }

    }

    public function remindResumeSMS(Request $request) {
        try {
            $base = BaseResume::findOrFail($request->base_resume) ;
            $rank = $this->getResumePercent($base) ;

            ResumeSmsLog::create([
                'base_id'   => $base->id
            ]);

            $dataSMS = ['mobile' => $base->user->mobile , 'name' => $base->name , 'lastName' => $base->last_name , 'rank' => $rank];
            Notification::send('sadas',new ResumeRemindSMS($dataSMS));
            return response()->json([ 'data' => [ 'success' => true, 'message' => __('massage.success_db') ]], 200 );
        }catch (\Exception $e){
            return response()->json([ 'data' => [ 'error' => true, 'message' => __('massage.error_db') ]], 500 );
        }
    }


    public  function getResumePercent($resume) {
        $rank = 20 ;
        if($resume->image)
            $rank += 5 ;
        if($resume->image)
            $rank += 15 ;
        if($resume->recordStudies->count() != 0)
            $rank += 5 ;
        if($resume->recordStudies->count() > 1)
            $rank += 5 ;
        if($resume->recordjobs->count() != 0)
            $rank += 10 ;
        if($resume->recordjobs->count() > 1)
            $rank += 10 ;
        if ( $resume->languages->count() != 0)
            $rank += 10 ;
        if ( $resume->articles->count() != 0)
            $rank += 5 ;
        if ( $resume->projects->count() != 0)
            $rank += 5 ;
        if ( $resume->honors->count() != 0)
            $rank += 5 ;
        if ( $resume->certificates->count() != 0)
            $rank += 5 ;
        return $rank ;
    }
}
