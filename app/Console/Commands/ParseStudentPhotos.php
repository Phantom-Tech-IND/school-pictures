<?php

namespace App\Console\Commands;

use App\Models\Institution;
use App\Models\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryItem;

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
            $institutionTypes = File::directories($yearPath);
            foreach ($institutionTypes as $institutionTypePath) {
                $institutionType = basename($institutionTypePath);
                $institutions = File::directories($institutionTypePath);
                foreach ($institutions as $institutionPath) {
                    $institutionNameWithPrefix = basename($institutionPath);
                    // Replace the numeric prefix with nothing and underscores with spaces for the institution name
                    $institutionName = preg_replace('/^\d+_/', '', $institutionNameWithPrefix);
                    $institutionName = str_replace('_', ' ', $institutionName);

                    $institution = Institution::firstOrCreate(
                        ['name' => $institutionName],
                        ['type' => $institutionType]
                    );

                    $students = File::directories($institutionPath);
                    foreach ($students as $studentPath) {
                        $studentNameWithPrefix = basename($studentPath);
                        // Replace the numeric prefix with nothing and underscores with spaces for the student name
                        $studentName = preg_replace('/^\d+_/', '', $studentNameWithPrefix);
                        $studentName = str_replace('_', ' ', $studentName);

                        $student = Student::firstOrCreate(
                            ['name' => $studentName, 'institution_id' => $institution->id]
                        );

                        // Check for the existence of the custom_birth_date file
                        $customBirthDateFilePath = $studentPath.'/custom_birth_date';
                        if (File::exists($customBirthDateFilePath)) {
                            $customBirthDate = File::get($customBirthDateFilePath);
                            $customBirthDate = trim($customBirthDate); // Trim any whitespace

                            // Remove potential BOM and non-visible characters
                            $bom = pack('H*', 'EFBBBF');
                            $customBirthDate = preg_replace("/^$bom/", '', $customBirthDate);

                            $dateObject = \DateTime::createFromFormat('d.m.Y', $customBirthDate);
                            if ($dateObject) {
                                $formattedDate = $dateObject->format('Y-m-d');
                                $student->birth_date = $formattedDate;
                                $student->save();
                            } else {
                                // Log or handle the error if the date format is incorrect
                                $this->error("Invalid date format for student: {$studentName}. Date: '{$customBirthDate}'");
                            }
                        }

                        $photos = File::allFiles($studentPath);
                        foreach ($photos as $photo) {
                            // Generate a unique identifier for the photo to prevent overwriting
                            if ($photo->getFilename() === 'custom_text' || $photo->getFilename() === 'custom_birth_date') {
                                continue; // Skip the current iteration
                            }
                            $originalPhotoName = $photo->getFilename();

                            // Check if the file is an image
                            $fileType = mime_content_type($photo->getPathname());
                            if (strpos($fileType, 'image') === 0) { // Check if file type starts with 'image'
                                // Existing code to add the photo
                            } else {
                                $this->error("Invalid file type for photo: {$photo->getFilename()}");
                            }
                            // Check if the photo already exists in the collection
                            $photoExists = $student->getMedia('student_photos')->contains(function ($value) use ($photo) {
                                return $value->file_name === $photo->getFilename();
                            });

                            // Only add the photo if it doesn't already exist
                            if (! $photoExists) {
                                $mediaItem = $student->addMedia($photo->getPathname())
                                    ->preservingOriginal()
                                    ->usingName($originalPhotoName)
                                    ->toMediaCollection('student_photos', 'public');

                                // Insert a record into the student_photos table
                                DB::table('student_photos')->insert([
                                    'student_id' => $student->id,
                                    'photo_path' => $mediaItem->getPath(), // Adjust according to how you store paths
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ]);

                                $this->info("Added photo for student: {$studentName}");
                            }
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
                // Manually add uploaded file to the Filament Media Library
                $uploadedFile = new \Illuminate\Http\UploadedFile($photo->getPathname(), $photoName);
                $mediaItem = MediaLibraryItem::addUpload($uploadedFile);

                // Optionally, update the student's photo attribute if it's empty
                if (empty($student->photo)) {
                    $student->photo = $mediaItem->getUrl(); // Assuming getUrl() method exists or similar to get the photo URL
                    $student->save();
                }

                $this->info("Added photo for student: {$studentName}");
            } else {
                $this->info("Photo already exists for student: {$studentName}");
            }
        }
    }
}
