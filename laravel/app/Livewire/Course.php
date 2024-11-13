<?php

namespace App\Livewire;

use App\Models\Course as c;
use Livewire\Component;

class Course extends Component
{
    public $courseId;

    /*public function mount($courseId)
    {
        $this->courseId = 1; //$courseId;
    }*/

    public function nextCourse()
    {
        $this->courseId += 1;
    }

    public function render()
    {
        $course = c::find(1); //$this->courseId

        return view('livewire.course', [
            'course' => $course,
            'defaultImage' => asset('images/courses/no-image.jpg'),
            //'name' => $course->name, huhhhh?
        ]);
    }
}
