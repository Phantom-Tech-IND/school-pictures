<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentForm extends Component
{
    use WithFileUploads;

    public $name;

    public $birth_date;

    public $institution_type;

    public $student_photos = [];

    public function render()
    {
        return view('livewire.student-form');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'birth_date' => 'required|date',
            'institution_type' => 'required',
            'student_photos.*' => 'image|max:1024', // 1MB Max per image
        ]);

        // Save the student information to the database
        $student = Student::create([
            'name' => $this->name,
            'birth_date' => $this->birth_date,
            'institution_type' => $this->institution_type,
        ]);

        // Handle file uploads
        foreach ($this->student_photos as $photo) {
            $fileName = $photo->getClientOriginalName();
            $customPath = "media/{$this->institution_type}/{$this->name}";
            $photo->storeAs($customPath, $fileName, 'public');
        }

        session()->flash('message', 'Student successfully created.');
        $this->reset(); // Reset form fields
    }
}
