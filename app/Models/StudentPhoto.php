<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'photo_path',
        'has_copyright',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
