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
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function setPhotoPathAttribute($value)
    {
        // Check if the value is an instance of UploadedFile
        if ($value instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['photo_path'] = $value->store('path/to/store/photos', 'public');
        } else {
            // If $value is a string, just set it as is
            $this->attributes['photo_path'] = $value;
        }
    }
}
