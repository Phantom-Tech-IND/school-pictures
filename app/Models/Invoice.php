<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'number', 'products', 'discount', 'currency',
        'original_amount', 'refunded_amount', 'custom_fields', 'order_id',
    ];

    protected $casts = [
        'products' => 'array',
        'discount' => 'array',
        'custom_fields' => 'array',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
