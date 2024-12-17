<?php

namespace App\Livewire\Pages\Staff;

use Livewire\Component;
use App\Models\User;
use App\Models\Course;
use App\Models\Professor;


class Staff extends Component
{
    public $userCount;
    public $courseCount;
    public $professorCount;

    public function mount()
    {
        // Fetch user, course, and professor count
        $this->userCount = User::count();
        $this->courseCount = Course::count();
        $this->professorCount = Professor::count();
    }

    public function render()
    {
        return view('livewire.pages.staff.staff');
    }
}
