<?php

namespace App\Livewire\Pages\Staff;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Professor;

class AddProfessor extends Component
{
    use WithFileUploads;

    public $name;
    public $title;
    public $image_path;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image_path' => 'nullable|image|max:1024',
    ];

    public function submit()
    {
        // Validate inputs
        $this->validate();

        // Store image
        if ($this->image_path) {
            $imagePath = $this->image_path->store('images/professors', 'public');
        } else {
            $imagePath = null;
        }

        // Create professor
        Professor::create([
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description,
            'image_path' => $imagePath,
        ]);

        // Reset form
        $this->reset();

        session()->flash('message', 'Professor added successfully.');
    }

    public function render()
    {
        return view('livewire.pages.staff.add-professor');
    }
}
