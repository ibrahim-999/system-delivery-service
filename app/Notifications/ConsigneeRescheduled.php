<?php

namespace App\Notifications;

use App\Models\Shipment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ConsigneeRescheduled extends Notification
{
    use Queueable;

    /**
     * @var Shipment
     */
    protected $shipment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Shipment $shipment)
    {
        $this->shipment = $shipment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mail = new MailMessage;
        $mail->subject("The consignee has rescheduled receiving the shipment - Admin Delivery")
            ->markdown('notifications.mail', [
                'tmpl'     => 'consignee-rescheduled',
                'client'   => $notifiable,
                'shipment' => $this->shipment
            ]);

        if (!empty($this->shipment->client->secondary_emails))
            $mail->cc($this->shipment->client->secondary_emails);

        return $mail;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
