<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyRetenderConstruction extends Notification implements ShouldBroadcast
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $tender;
    public function __construct($tender)
    {
        $this->user = $tender->user;
        $this->tender = $tender;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast','database','mail'];
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
        ->line('Contracting Tender')
        ->line($this->user->name.' Update The Tender ')
        ->action('View Project', url('/#/admin/construction-Tenders/'.$this->tender->id))
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
             'user'=>$this->user,
            'retender_construction_notes'=>$this->tender,


        ];
    }
    public function ToBroadcast($notifiable){

        return new BroadcastMessage([
            'data'=>[
                'user'=>$this->user,
                'retender_construction_notes'=>$this->tender,
            ]
        ]);
    }
}
