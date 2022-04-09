<?php

namespace App\Notifications\company\SMS;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Tzsk\Sms\Builder;

class AcceptRejectNotification extends Notification
{
    use Queueable;

    protected  $data ;

    /**
     * Create a new notification instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return [\App\Channels\SmsAcceptRejectChannel::class];
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
        if($this->data['is_show'] == 'yes')
            $message = 'آگهی " ' . $this->data['advertising_title'] . ' " که در کاراول ثبت نمودید تایید گردید. ' . ' karavel.ir ' ;
        else if ($this->data['is_show'] == 'no')
            $message = 'آگهی " ' . $this->data['advertising_title'] . ' " که در کاراول ثبت نمودید رد شد. برای بررسی دلیل عدم تایید به پنل خود مراجعه کنید. ' . ' karavel.ir ' ;
        return [
            'receptor'  => $this->data['mobile'],
            'message'   => $message,
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
