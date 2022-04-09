<?php

namespace App\Notifications\Member\SMS;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangeStatusNotification extends Notification
{
    use Queueable;

    protected  $data;

    /**
     * Create a new notification instance.
     *
     * @param  $data
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
    public function via($notifiable) :array
    {
        return [\App\Channels\ChangeStatusChannel::class];
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

    public function toSMS( $notifiable ) :array
    {
        return [
            'receptor' => $this->data['mobile'],
            'message'  =>  ' وضعیت رزومه شما برای فرصت شغلی ' . $this->data['advertising_title'] . ' به ' . $this->data['status'] . ' تغییر یافت . ' . ' karavel.ir '
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
