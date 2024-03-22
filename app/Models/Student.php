<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Student extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

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
