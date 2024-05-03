<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_type',
        'name',
        'category',
        'price',
        'images',
        'additional_information',
        'description',
        'custom_attributes',
    ];

    protected $casts = [
        'custom_attributes' => 'array',
        'tags' => 'array',
        'images' => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

     public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}
