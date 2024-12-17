<?php

namespace App\Livewire\Pages\Staff;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Course;
use App\Models\Professor;

class AddCourse extends Component
{
    use WithFileUploads;

    public $name;
    public $code;
    public $description;
    public $course_picture;
    public $selectedProfessors = [];


    protected $rules = [
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:255|unique:courses,code',
        'description' => 'required|string',
        'course_picture' => 'nullable|image|max:1024',
        'selectedProfessors' => 'array',
    ];

    public function submit()
{
    // Validate inputs
    $this->validate();

    // Store image
    if ($this->course_picture) {
        $imagePath = $this->course_picture->store('images/courses', 'public');
    } else {
        $imagePath = null;
    }

    // Create course
    $course = Course::create([
        'name' => $this->name,
        'code' => $this->code,
        'description' => $this->description,
        'image_path' => $imagePath,
    ]);

    // Attach professors
    if (!empty($this->selectedProfessors)) {
        $course->professors()->attach($this->selectedProfessors);
    }

    // Reset form
    $this->reset();

    session()->flash('message', 'Course added successfully.');
}

    public function render()
    {
        // Get all professors for search
        $allProfessors = Professor::orderBy('name', 'asc')->get();


        return view('livewire.pages.staff.add-course', [
            'allProfessors' => $allProfessors,
        ]);

    }
}