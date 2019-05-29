<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\CostServiceApartment;

class ServiceFeeNotification extends Notification
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
        return (new MailMessage)->subject('Hệ thống quản lý chung cư Building Care thông báo')->view(
            'emails.fee_service_notification', ['cost' => $this->cost]);
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
            'noti_name' => 'Thông tin chi phí dịch vụ tháng '. $this->cost->month,
            'message' => 'Cư dân cần thanh toán dịch vụ từ trong khoảng 25-30 hàng tháng!',
            'month' => $this->cost->month,
        ];
    }
}
