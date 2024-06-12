<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'pickup',
        'amount', 'status', 'invoice', 'contact_id', 'payment_method', 'payment_status',
        'address_same_as_billing', 'billing_address', 'shipping_address', 'comment', 'shipping_cost',
    ];

    public function getBillingAddressAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getShippingAddressAttribute($value)
    {
        return json_decode($value, true);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
