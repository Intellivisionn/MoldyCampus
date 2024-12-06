<?php

namespace App\Livewire\Pages\Admin;

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
    $this->validate();

    if ($this->course_picture) {
        $imagePath = $this->course_picture->store('images/courses', 'public');
    } else {
        $imagePath = null;
    }

    $course = Course::create([
        'name' => $this->name,
        'code' => $this->code,
        'description' => $this->description,
        'image_path' => $imagePath,
    ]);

    if (!empty($this->selectedProfessors)) {
        $course->professors()->attach($this->selectedProfessors);
    }

    $this->reset();

    session()->flash('message', 'Course added successfully.');
}

    public function render()
    {
        $allProfessors = Professor::orderBy('name', 'asc')->get();

        return view('livewire.pages.admin.add-course', [
            'allProfessors' => $allProfessors,
        ]);

    }
}
