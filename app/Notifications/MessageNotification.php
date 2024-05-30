<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Message;
use Illuminate\Support\Facades\Config;

class MessageNotification extends Notification
{
    use Queueable;

    private Message $message;

    /**
     * Create a new notification instance.
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $mailMessage = (new MailMessage)
            ->from(Config::get('mail.from.address'), Config::get('mail.from.name'))
            ->subject('New message from ' . $this->message->name)
            ->greeting('New message')
            ->line('From: **' . $this->message->name . '**')
            ->action('Check message', url('/admin/messages/' . $this->message->id . '/edit'))
            ->line('Email: ' . $this->message->email)
            ->line('Interests:')
            ->line(implode(', ', $this->message->interests ?? []))
            ->line('Appointment: ' . ($this->message->appointment_date ?? 'N/A') . ' | ' . ($this->message->appointment_time ?? 'N/A'))
            ->line('Subject: ' . $this->message->subject)
            ->line($this->message->message);

        return $mailMessage;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => $this->message->toArray(),
        ];
    }
}
