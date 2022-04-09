<?php

namespace App\Notifications\Member\SMS;

use App\Channels\SMSAdvertisingOfferChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendSMSOffer extends Notification
{
    use Queueable;
    protected  $data ;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return SMSAdvertisingOfferChannel::class;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toSMS($notifiable) :array
    {
        $message = 'دوست گرامی، متناسب با تخصص شما، یک فرصت شغلی گردشگری در سایت کاراول ایجاد شده است.
در صورت تمایل از این فرصت بهره ببرید.
--------
در صورتی که تمایل ندارید پیشنهادات کار برای شما ارسال گردد، وارد پنل خود در کاراول شده و این بخش را غیرفعال کنید.
                        www.karavel.ir';
        return [
            'receptor'  => $this->data['baseResumes'],
            'message'   => $message ,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
