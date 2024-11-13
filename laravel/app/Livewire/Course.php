<?php

namespace App\Livewire;

use App\Models\Course as c;
use Livewire\Component;
use App\Models\Professor;
use App\Models\User;
use App\Models\CourseRating;

class Course extends Component
{
    public $courseId;

    /*public function mount($courseId)
    {
        $this->courseId = 1; //$courseId;
    }*/

    public function render()
    {
        $courseId = 11; //set course ID to 1 for now

        $course = c::find($courseId); //$this->courseId

        $reviews = $course ? $course->reviews()->get()->toArray() : [];

        $professors = $course ? $course->professors()->get()->toArray() : [];

        //$names = User::

        return view('livewire.course', [
            'course' => $course,
            'defaultImage' => asset('images/courses/no-image.jpg'),
            //'professors' => Professor::where
            'reviews' => $reviews,
            'professors' => $professors,
        ]);
    }
}
