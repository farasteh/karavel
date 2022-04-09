<?php

namespace App\Notifications\admin\telegram;

use App\Channels\advertisingTelegramChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class advertisingTelegramNotification extends Notification
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
        $this->data  = $data ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [\App\Channels\advertisingTelegramChannel::class];
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

   public  function  toTelegaram($notifiable) : array
    {
        $utf8emoji = '👇';
        $location = $this->data['province'] ? "*محل: " .  $this->data['province'] . " , " . $this->data['city'] . "\n" : '';
        $message = "<b>#استخدام_آژانس_مسافرتی_هواپیمایی</b>\n"
            .'*کد' . $this->data['code']. "\n"
            ."*عنوان آگهی: ".$this->data['title'] . "\n"
            ."*شغل موردنیاز: " . $this->data['job'] . " , " . $this->data['category'] ."\n"
            .$location
            ."*مشاهده این فرصت شغلی ". $utf8emoji ."\n"
            ."www.karavel.ir/jobs/" . $this->data['id'] ."\n"
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
