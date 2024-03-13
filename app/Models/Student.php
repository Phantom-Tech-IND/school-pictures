<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'institution_id',
        'photo',
    ];

    protected $casts = [
        'photo' => 'array',
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function photos()
    {
        return $this->hasMany(StudentPhoto::class);
    }
}
