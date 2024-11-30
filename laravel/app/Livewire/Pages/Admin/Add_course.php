<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use App\Models\Course; // Make sure you have a Course model
use Livewire\WithFileUploads;

class AddCourse extends Component
{
    use WithFileUploads;

    // Define public properties for each form field
    public $name;
    public $code;
    public $description;
    //public $profile_picture;

    // Validation rules
    protected $rules = [
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:255|unique:courses,code',
        'description' => 'required|string',
        //'picture' => 'nullable|image|max:1024', // Max 1MB //Dont know how to do this
    ];

    // Method to handle form submission
    public function submit()
    {
        $this->validate();

        // Handle file upload if a profile picture is provided
       // if ($this->profile_picture) {
       //     $profilePicturePath = $this->profile_picture->store('profile_pictures', 'public');
       // } else {
       //     $profilePicturePath = null;
       // }

        // Create a new course record in the database
        Course::create([
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            //'profile_picture' => $profilePicturePath,
        ]);

        // Reset form fields
        $this->reset();

        // Flash success message
        session()->flash('message', 'Course added successfully.');
    }

    public function render()
    {
        return view('livewire.pages.admin.add_course');
    }
}

