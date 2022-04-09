<?php

namespace App\Channels;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Notifications\Notification;

class SmsChannel {
    /**
     * Send the given notification.
     *
     * @param  mixed $notifiable
     * @param  \Illuminate\Notifications\Notification $notification
     *
     * @return void
     */
    public function send( $notifiable, Notification $notification ) {
        $variables    = $notification->toSms( $notifiable );
        $api_url      = env( 'SMS_SERVICE_URL' );
        $api_username = env( 'SMS_SERVICE_USERNAME' );
        $api_password = env( 'SMS_SERVICE_PASSWORD' );
        $api_from     = env( 'SMS_FROM_NUMBER' );
        $res  = Http::post($api_url,[
            'user'        => $api_username,
            'pass'        => $api_password,
            'fromNum'     => $api_from,
            'toNum'       => $variables['receptor'],
            'patternCode' => env('SMS_PATTERN'),
            'op'          => 'pattern',
            'inputData'   => [[ 'verification-code'=>$variables['verify_code']]],

        ] );
        $status = $res->status();

//        error_log($res,3,'./logs.txt');
        return response()->json( 'test', $status);

    }
}
