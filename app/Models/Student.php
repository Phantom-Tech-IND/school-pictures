<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Database\Eloquent\Model;

class Student extends Model implements AuthAuthenticatable
{
    use Authenticatable;

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
