<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Course;
use App\Models\Professor;


class Admin extends Component
{
    public $userCount;
    public $courseCount;
    public $professorCount;

    public function mount()
    {
        $this->userCount = User::count();
        $this->courseCount = Course::count();
        $this->professorCount = Professor::count();
    }

    public function render()
    {
        return view('livewire.pages.admin.admin');
    }
}
