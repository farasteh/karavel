<?php

namespace App\Http\Controllers\v1\Admin\Telegram;

use App\Http\Controllers\Controller;

use App\Models\BaseResume;
use App\Models\telegramUser;
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
                'code'      => 'k' . ( ( $baseResume->id * 2 )+ 3 ) ,
                'gender'    =>  $baseResume->gens ?  $baseResume->gens->title.' / '  : '' ,
                'birthdate' => $baseResume->birth_date ?  $this->getBirthDate($baseResume->birth_date).' ساله / '  : '',
                'job'       => $baseResume->getjob ? $baseResume->getjob->title : '',
                'category'  => $baseResume->getCategoty ?  $baseResume->getCategoty->title : '',
                'province'  => $baseResume->getProvince ? '/'.$baseResume->getProvince->title.' , '  : ''   ,
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

    public function getBirthDate($birthDate) {
        $birthdate = null ;
        if($birthDate) {
            $v1 = Verta::now();
            $v = Verta::parse($birthDate);
            $birthdate = $v->diffYears($v1);
        }
        return $birthdate ;
    }

    public  function getResumePercent($baseResume) {
        $rank = 35 ;
        if($baseResume->recordStudies->count() != 0)
            $rank += 15 ;
        if($baseResume->recordjobs->count() != 0)
            $rank += 15 ;
        if ( $baseResume->languages->count() != 0)
            $rank += 15 ;
        if ( $baseResume->articles->count() != 0)
            $rank += 20 ;
        return $rank ;
    }
}
