<?php

namespace App\Channels;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Notifications\Notification;
use function Symfony\Component\String\s;

class advertisingTelegramChannel {
    /**
     * Send the given notification.
     *
     * @param  mixed $notifiable
     * @param  \Illuminate\Notifications\Notification $notification
     *
     * @return void
     */
    public function send( $notifiable, Notification $notification ) {
        $variables    = $notification->toTelegaram( $notifiable );
        $channelId = env( 'TELEGRAM_CHANNEL_ID' );
        $bot_Token    = env('TELEGRAM_BOT_TOKEN');
        $url = 'https://api.telegram.org/bot'.$bot_Token.'/sendPhoto';
        try {
            $res  = Http::post( $url ,[
                'chat_id'   => $channelId,
                'caption'      => $variables['message'],
                'photo'     => 'https://karavel.ir/images/karfarma_telegram.jpg',
                'parse_mode' => 'HTML'
            ]);
            $status = $res->status();
            return response()->json( $res->json(),$status);
        }
        catch (\Exception $e){
            return response()->json(['data' => ['error' => true , 'massage' => __('massage.error_db') ]], 500);

        }

    }
}
