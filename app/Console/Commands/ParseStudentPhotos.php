<?php

namespace App\Console\Commands;

use App\Models\Student;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ParseStudentPhotos extends Command
{
    protected $signature = 'parse:student-photos';

    protected $description = 'Parse student photos and update student records';

    public function handle()
    {
        $mediaPath = public_path('media');
        foreach (File::directories($mediaPath) as $directory) {
            $institutionType = basename($directory);
            if (in_array($institutionType, ['kindergarden', 'school'])) {
                $this->processInstitution($mediaPath, $institutionType);
            }
        }
    }

    protected function processInstitution($mediaPath, $institutionType)
    {
        foreach (File::directories("$mediaPath/$institutionType") as $studentDir) {
            $this->processStudentDirectory($studentDir, $institutionType);
        }
    }

    protected function processStudentDirectory($studentDir, $institutionType)
    {
        $studentName = basename($studentDir);
        $student = Student::where('name', $studentName)->first();

        $birthDate = $this->getFormattedBirthDate("$studentDir/custom_birth_date");
        if (! $birthDate) {
            $this->error("Invalid birth date format for student: $studentName");

            return;
        }

        if (! $student) {
            $student = $this->createStudent($studentName, $institutionType, $birthDate);
        } else {
            $student->birth_date = $birthDate;
            $student->save();
        }

        $this->updateStudentPhotos($student, $studentDir, $institutionType);
    }

    protected function getFormattedBirthDate($birthDateFilePath)
    {
        $birthDateContents = trim(file_get_contents($birthDateFilePath), "\xEF\xBB\xBF");
        $birthDate = DateTime::createFromFormat('d.m.Y', $birthDateContents);

        return $birthDate ? $birthDate->format('Y-m-d') : null;
    }

    protected function createStudent($studentName, $institutionType, $birthDate)
    {
        $student = new Student([
            'name' => $studentName,
            'institution_type' => $institutionType,
            'birth_date' => $birthDate,
        ]);
        $student->save();

        return $student;
    }
    
    protected function updateStudentPhotos(Student $student, $studentDir, $institutionType)
    {
        foreach (File::allFiles($studentDir) as $photo) {
            $photoName = $photo->getFilename();
            if (in_array($photoName, ['custom_birth_date', 'custom_text', 'imported'])) {
                continue;
            }

            $basePath = public_path('media');
            $fullPhotoPath = $studentDir.'/'.$photo->getFilename();

            $relativePhotoPath = '/media/' . $institutionType . '/' . $photo->getFilename();
 
            if (! DB::table('student_photos')
                ->where('student_id', $student->id)
                ->where('photo_path', '=', $relativePhotoPath)
                ->exists()) {
                $this->addPhotoToStudent($photo, $student, $studentDir, $institutionType);
            } else {
                $this->info("Skipping duplicate photo: {$photo->getFilename()}");
            }
        }
    }
    
    protected function addPhotoToStudent($photo, Student $student, $studentDir, $institutionType)
    {
        $basePath = storage_path('app/public/media');

        $targetDir = $basePath . '/' . $institutionType;
        if (!File::exists($targetDir)) {
            File::makeDirectory($targetDir, 0755, true);
        }

        $fullPhotoPath = $targetDir . '/' . $photo->getFilename();

        File::copy($photo->getPathname(), $fullPhotoPath);

        $relativePhotoPath = '/media/' . $institutionType . '/' . $photo->getFilename();

        $studentPhoto = new \App\Models\StudentPhoto([
            'student_id' => $student->id,
            'photo_path' => $relativePhotoPath,
        ]);

        $studentPhoto->save();

        $this->info("Photo {$photo->getFilename()} added for student: {$student->name} with path {$relativePhotoPath}");
    }
}