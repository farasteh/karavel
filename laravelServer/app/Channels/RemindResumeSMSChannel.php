<?php

namespace App\Channels;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Notifications\Notification;

class RemindResumeSMSChannel {
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
        $admin_sms    = env('SMS_ADMIN_PHONE');
        $res  = Http::post($api_url,[
            'uname'   => $api_username,
            'pass'    => $api_password,
            'from'    => $api_from,
            'message' => $variables['message'],
            'to'      => [$variables['receptor'], $admin_sms],
            'op'      => 'send'
        ]);
        $status = $res->status();
        return response()->json( $res->json(),$status);
    }
}
