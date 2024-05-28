<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use App\Models\Order;
use App\Models\Contact;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Collection;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;
    public Contact $contact;
    /** @var Collection<int, OrderItem> */
    public Collection $items;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order, Contact $contact) {
        $this->order = $order;
        $this->contact = $contact;
        $this->items = $order->items()->with('product')->get(); // Load product relationship
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.order_created',
        );
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')),
            subject: 'Order Created - '.$this->order->id,
            to: [new Address($this->contact->email, $this->contact->name)],
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
