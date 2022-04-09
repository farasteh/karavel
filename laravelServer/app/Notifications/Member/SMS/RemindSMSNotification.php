<?php

namespace App\Notifications\Member\SMS;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RemindSMSNotification extends Notification
{
    use Queueable;
    protected $data ;
    /**
     * Create a new notification instance.
     *
     * @return void
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
    public function via($notifiable)
    {
        return [\App\Channels\RemindResumeSMSChannel::class];
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
        $message = 'دوست گرامی ' . $this->data['name'] .' ' . $this->data['lastName'] . ' ، نمره کاراولی شما ' .$this->data['rank'] .' است، برای به دست آوردن فرصت های شغلی گردشگری ، رزومه خود را در سایت کامل تر کنید. '  .'  karavel.ir  ';
        return [
            'receptor'  => $this->data['mobile'],
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
