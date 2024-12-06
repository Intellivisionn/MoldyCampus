<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Professor;

class AddLecturer extends Component
{
    use WithFileUploads;

    public $name;
    public $title;
    public $lecturer_picture;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'lecturer_picture' => 'nullable|image|max:1024',
    ];

    public function submit()
    {
        $this->validate();

        if ($this->lecturer_picture) {
            $imagePath = $this->lecturer_picture->store('images/lecturers', 'public');
        } else {
            $imagePath = null;
        }

        Professor::create([
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description,
            'lecturer_picture' => $imagePath,
        ]);

        $this->reset();

        session()->flash('message', 'Lecturer added successfully.');
    }

    public function render()
    {
        return view('livewire.pages.admin.add-lecturer');
    }
}
