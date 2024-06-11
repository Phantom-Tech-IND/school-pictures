<?php

namespace App\Mail;

use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Order $order;

    public Contact $contact;

    /** @var Collection<int, OrderItem> */
    public Collection $items;

    public string $emailRole;

    public string $address;

    public string $country;

    public string $city;

    public string $zip;

    public string $comment;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order, Contact $contact, string $emailRole)
    {
        $this->order = $order;
        $this->contact = $contact;
        $this->emailRole = $emailRole;
        $this->items = $order->items()->with('product')->get();

        $billingAddress = $order->billing_address;
        $shippingAddress = $order->shipping_address;

        if ($order->address_same_as_billing) {
            $this->address = $billingAddress['address'];
            $this->country = $billingAddress['country'];
            $this->city = $billingAddress['city'];
            $this->zip = $billingAddress['zip'];
        } else {
            $this->address = $shippingAddress['address'];
            $this->country = $shippingAddress['country'];
            $this->city = $shippingAddress['city'];
            $this->zip = $shippingAddress['zip'];
        }
        $this->comment = $order->comment;
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
