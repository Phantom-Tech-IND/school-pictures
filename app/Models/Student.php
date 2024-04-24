<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'photo',
        'institution_type',
    ];

    protected $casts = [
        'photo' => 'array',
    ];

    public function photos()
    {
        return $this->hasMany(StudentPhoto::class);
    }
}
