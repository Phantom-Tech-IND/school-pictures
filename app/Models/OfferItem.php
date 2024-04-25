<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'is_popular', 'custom_attributes'];

    protected $casts = [
        'custom_attributes' => 'array',
    ];

    public function offer()
    {
        return $this->belongsTo(Offers::class, 'offer_id');
    }
}
