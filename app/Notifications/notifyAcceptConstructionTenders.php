<?php

namespace App\Notifications;

use App\Tconstr;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class notifyAcceptConstructionTenders extends Notification implements ShouldBroadcast
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $Tender_owner;  public $TenderAccepted;
    public function __construct(Tconstr $TenderAccepted )
    {

        $this->Tender_owner = $TenderAccepted->user;
        $this->TenderAccepted = $TenderAccepted;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast','mail'];
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
                    ->line($this->Tender_owner->name.' Your tender has been accepted')
                    ->action('View Project', url('/#/tenders/construction/'.$this->TenderAccepted->id))
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
            'Tender_Consurction_owner'=>$this->Tender_owner,
            'Tender_Construction_Accepted'=>$this->TenderAccepted
        ];
    }
    public function ToBroadcast($notifiable){

        return new BroadcastMessage([
            'data'=>[
                'Tender_Consurction_owner'=>$this->Tender_owner,
                'Tender_Construction_Accepted'=>$this->TenderAccepted
            ]
        ]);
    }
}
