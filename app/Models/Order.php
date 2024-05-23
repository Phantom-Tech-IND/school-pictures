<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 'status', 'invoice', 'contact_id', 'payment_method', 'payment_status',
        'address_same_as_billing', 'billing_address', 'shipping_address',
    ];

    protected $casts = [
        'billing_address' => 'array',
        'shipping_address' => 'array',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
