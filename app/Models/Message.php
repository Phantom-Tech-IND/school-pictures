<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'subject',
        'appointment_date',
        'appointment_time',
        'interests', // Ensure this is cast to an array in the model
    ];

    protected $casts = [
        'interests' => 'array',
    ];
}
