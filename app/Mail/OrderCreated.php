<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public $contact;

    /**
     * Create a new message instance.
     */
    public function __construct($order, $contact)
    {
        $this->order = $order;
        $this->contact = $contact;
    }

    public function build()
    {
        $mailMessage = (new MailMessage)
            ->subject('Order Created - '.$this->order->id)
            ->line('Your order has been created.')
            ->line('Order ID: '.$this->order->id)
            ->line('Amount: '.$this->order->amount)
            ->line('Contact: '.$this->contact->name)
            ->line('Contact Email: '.$this->contact->email)
            ->line('Contact Phone: '.$this->contact->phone)
            ->line('Contact Address: '.$this->contact->address)
            ->line('Contact City: '.$this->contact->city)
            ->line('Contact Zip: '.$this->contact->zip)
            ->line('Contact Country: '.$this->contact->country);

        return $this->from('example@example.com') // Optionally set the sender
            ->markdown('emails.simple', ['mailMessage' => $mailMessage->toArray()]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Created - '.$this->order->id,
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
