<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // If you want to use soft deletes
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FAQ extends Model
{
    use HasFactory; // Enable soft deletes if needed

    protected $fillable = ['question', 'answer', 'category_id']; // Updated to include 'category_id'

    // Update validation rules to include 'category_id'
    public static function validationRules()
    {
        return [
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|integer|exists:f_a_q_categories,id', // Ensure the category_id exists in the categories table
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(FAQCategory::class, 'category_id');
    }
}
