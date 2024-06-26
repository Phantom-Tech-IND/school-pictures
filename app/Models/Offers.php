<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'photo_gallery'];

    protected $casts = [
        'photo_gallery' => 'array',
    ];

    public function offerItems()
    {
        return $this->hasMany(OfferItem::class, 'offer_id');
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/'.$this->image);
    }
}
