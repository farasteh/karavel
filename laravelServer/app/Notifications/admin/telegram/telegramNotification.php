<?php

namespace App\Notifications\admin\telegram;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class telegramNotification extends Notification
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
        return [\App\Channels\userTelegramChannel::class];
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

    public  function  toTelegaram( $notifiable) : array
    {
        $utf8emoji = '👇';
        $code = "*کد " . 'KS'.( ($this->data['id']*2 )+ 3) . "\n";
        $gender = $this->data['birthdate'] && $this->data['gender'] ? "*".$this->data['gender'] . " / " : "*".$this->data['gender'];
        $birthdate = $this->data['birthdate'] ?   $this->data['birthdate'] . " ساله " : '' ;
        $space = $this->data['birthdate'] || $this->data['gender'] ?  "\n" : '' ;
        $job = "*تخصص من : " . $this->data['job'] . " ، " . $this->data['category'] . "\n" ;
        $location = $this->data['province'] ? "*محل : " . $this->data['province'] . $this->data['city'] . "\n" : '' ;
        $message = "<b>#رزومه_کارمند_آژانس</b>\n"
                   .$code
                   . $gender . $birthdate .$space. $job . $location
                    ."*نمره کاراولی من: " . "%" . $this->data['rank']. "\n"
                     ."*مشاهده رزومه من ". $utf8emoji ."\n"
                    ."www.karavel.ir/resume/pdf/" . $this->data['id'] . "\n"
                    ."_______________________________" ."\n"
                    ."عضویت در کانال تلگرام کاراول" . "\n"
                    ."https://t.me/karavel_ir_co" ."\n"
                    ."_______________________________"

        ;
        return [
            'message'      => $message
        ];
    }
}
