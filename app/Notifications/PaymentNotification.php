<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\CostServiceApartment;

class PaymentNotification extends Notification
{
    use Queueable;
    protected $cost;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(CostServiceApartment $cost)
    {
        $this->cost = $cost;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Hóa đơn tháng '. $this->cost->month . ' đã được thanh toán',
            'status' => $this->cost->status,
            'amount' => $this->cost->amount,
            'apartment' => $this->cost->apartment->name,
            // 'amount' => $this->cost->amount,
        ];
    }
}
