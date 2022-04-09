<?php

namespace App\Http\Controllers\v1\Site;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\Company;
use App\Notifications\company\SMS\ResumeSentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class SMSController extends Controller
{
    public function get() {
dd('dd');
        $advertisings = DB::table('advertizing_resumes')->get();
        foreach ($advertisings as $ad) {
            dd('hello');
            $user = Advertising::with(['company'])->find($ad->advertising)->loadMorph('company' , [ Company::class => ['user'] ]);
            $dataSMS = ['mobile' => $user->company->user->mobile , 'advertising_title' => $user->title ];
            Notification::send('sadas',new ResumeSentNotification($dataSMS));
        }
    }
}
