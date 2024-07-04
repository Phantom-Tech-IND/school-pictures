<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\WatermarkService;

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

    protected static function booted()
    {
        static::created(function ($studentPhoto) {
            $fullPhotoPath = storage_path('app/public/' . $studentPhoto->photo_path);
            WatermarkService::addWatermark($fullPhotoPath, $fullPhotoPath);
        });
    }
}
