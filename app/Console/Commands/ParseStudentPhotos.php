<?php

namespace App\Console\Commands;

use App\Models\Institution;
use App\Models\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ParseStudentPhotos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:student-photos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse student photos and update student records';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mediaPath = public_path('media');
        $directories = File::directories($mediaPath);

        foreach ($directories as $yearPath) {
            // Assuming the first directory under the year is the type of institution
            $institutionTypes = File::directories($yearPath);
            foreach ($institutionTypes as $institutionTypePath) {
                $institutionType = basename($institutionTypePath);
                $institutions = File::directories($institutionTypePath);
                foreach ($institutions as $institutionPath) {
                    $institutionNameWithPrefix = basename($institutionPath);
                    // Remove the numeric prefix and underscore (e.g., "0001_") from the institution name
                    $institutionName = preg_replace('/^\d+_(.*)$/', '$1', $institutionNameWithPrefix);

                    // Here, you should update or create the institution with the correct type and name
                    $institution = Institution::firstOrCreate(
                        ['name' => $institutionName],
                        ['type' => $institutionType] // Set the type of institution here
                    );

                    $students = File::directories($institutionPath);
                    foreach ($students as $studentPath) {
                        $studentName = basename($studentPath);
                        $student = Student::firstOrCreate(
                            ['name' => $studentName, 'institution_id' => $institution->id]
                        );
                        $photos = File::allFiles($studentPath);
                        foreach ($photos as $photo) {
                            // Associate the photo with the student record
                            $relativePhotoPath = 'media/'.$institutionType.'/'.$institutionName.'/'.basename($yearPath).'/'.$studentName.'/'.$photo->getFilename();
                            $student->addMedia($photo->getPathname())->usingName($photo->getFilename())->toMediaCollection('student_photos', 'public');
                        }
                    }
                }
            }
        }
    }

    protected function processInstitution($mediaPath, $institutionType)
    {
        $institutionPath = $mediaPath.'/'.$institutionType;
        $eventIds = File::directories($institutionPath);

        foreach ($eventIds as $eventIdPath) {
            $this->processEvent($eventIdPath, $institutionType);
        }
    }

    protected function processEvent($eventIdPath, $institutionType)
    {
        $eventId = basename($eventIdPath);
        $studentDirectories = File::directories($eventIdPath);

        foreach ($studentDirectories as $studentDir) {
            $this->processStudentDirectory($studentDir, $institutionType, $eventId);
        }
    }

    protected function processStudentDirectory($studentDir, $institutionType, $eventId)
    {
        $studentName = basename($studentDir);
        $student = Student::where('name', $studentName)->first();

        if ($student) {
            $this->updateStudentPhotos($student, $studentDir, $institutionType, $eventId, $studentName);
        } else {
            $this->error("Student not found: {$studentName}");
        }
    }

    protected function updateStudentPhotos($student, $studentDir, $institutionType, $eventId, $studentName)
    {
        $studentPhotos = File::allFiles($studentDir);
        foreach ($studentPhotos as $photo) {
            $photoName = $photo->getFilename();
            $relativePhotoPath = 'media/'.$institutionType.'/'.$eventId.'/'.$studentName.'/'.$photoName;

            // Check if a photo with the same path already exists
            $photoExists = DB::table('student_photos')
                ->where('student_id', $student->id)
                ->where('photo_path', $relativePhotoPath)
                ->exists();

            if (! $photoExists) {
                DB::table('student_photos')->insert([
                    'student_id' => $student->id,
                    'photo_path' => $relativePhotoPath,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $this->info("Added photo for student: {$studentName}");
            } else {
                $this->info("Photo already exists for student: {$studentName}");
            }
        }
    }
}
