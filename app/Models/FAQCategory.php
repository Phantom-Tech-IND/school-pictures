<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes
use Illuminate\Database\Eloquent\Relations\HasMany;

class FAQCategory extends Model
{
    use HasFactory; // Use SoftDeletes trait

    protected $fillable = ['name'];

    public function faqs(): HasMany
    {
        return $this->hasMany(FAQ::class, 'category_id');
    }
}
