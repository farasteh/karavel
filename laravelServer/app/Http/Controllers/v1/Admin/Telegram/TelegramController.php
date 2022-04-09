<?php

namespace App\Http\Controllers\v1\Admin\Telegram;

use App\Http\Controllers\Controller;

use App\Models\Advertising;
use App\Models\BaseResume;
use App\Models\telegramAdvertising;
use App\Models\telegramUser;
use App\Notifications\admin\telegram\advertisingTelegramNotification;
use App\Notifications\admin\telegram\telegramNotification;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class TelegramController extends Controller
{
    public function  storeMessage($id) {
        try
        {
            $baseResume = BaseResume::with('telegram')->findOrFail($id) ;

            if($baseResume->telegram()->count() >= 1){
                return response()->json(['data' =>['success' => true , 'message'=>'شما قبلا این رزومه را به تلگرام اضافه کرده اید.' ] ],202);
            }
            $telegramData  = [
                'id'        => $baseResume->id ,
                'gender'    => $baseResume->gens ?  $baseResume->gens->title : '' ,
                'birthdate' => $baseResume->birth_date ?  $this->getBirthDate($baseResume->birth_date)  : '',
                'job'       => $baseResume->getjob ? $baseResume->getjob->title : '',
                'category'  => $baseResume->getCategoty ?  $baseResume->getCategoty->title : '',
                'province'  => $baseResume->getProvince ? $baseResume->getProvince->title.' , '  : ''   ,
                'city'      => $baseResume->getCity ? $baseResume->getCity->title  : ''   ,
                'rank'      => $this->getResumePercent($baseResume)
            ] ;

            Notification::send('sadas' , new telegramNotification($telegramData));


            telegramUser::create([
               'base_resume'  => $baseResume->id ,
               'status'       => 1
            ]);
            return response()->json( ['data' =>[ 'success' => true, 'message' => 'این رزومه با موفیت به پست های تلگرام افزوده شد.' ]], 200 );
        }
        catch (\Exception $e){
            return response()->json(['data' => ['error' => true , 'massage' => __('massage.error_db') ]], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function storeAdvertisingMessage($id) {
        try {
            $advertising = Advertising::with('telegram')->findOrFail($id);
            if($advertising->telegram()->count() >= 1){
                return response()->json(['data' =>['success' => true , 'message'=>'شما قبلا این رزومه را به تلگرام اضافه کرده اید.' ] ],202);
            }

            $telegramData  = [
                'id'            => $advertising->id ,
                'code'          => 'KM' . ( ( $advertising->id * 2 )+ 3 ) ,
                'title'         => $advertising->title ,
                'company'       => $advertising->company ? $advertising->company->name  : '',
                'province'      => $advertising->Province ? $advertising->Province->title : '' ,
                'city'          => $advertising->City ? $advertising->City->title : ''  ,
                'job'           => $advertising->Job ? $advertising->Job->title : '' ,
                'category'      => $advertising->CategoryJob ? $advertising->CategoryJob->title : '' ,
            ] ;

            Notification::send('sadas' , new advertisingTelegramNotification($telegramData));

            telegramAdvertising::create([
                'advertising'  => $advertising->id ,
                'status'       => 1
            ]);

            return response()->json( ['data' =>[ 'success' => true, 'message' => 'این آگهی با موفیت به پست های تلگرام افزوده شد.' ]], 200 );
        }
        catch (\Exception $e)  {
            return response()->json(['data' => ['error' => true , 'massage' => __('massage.error_db') ]], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getBirthDate($birthDate) {
        $birthdate = null ;
        if($birthDate) {
            $v1 = Verta::now();
            $v = Verta::parse($birthDate);
            $birthdate = $v->diffYears($v1);
        }
        return $birthdate ;
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
