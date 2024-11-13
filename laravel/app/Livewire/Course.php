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

    /*public function mount($courseId) //should add this mount so we can get the id each time
    {
        $this->courseId = 1; //$courseId;
    }*/

    public function render()
    {
        $courseId = 11; //set course ID staticly

        $course = c::find($courseId); //$this->courseId //change after, this finds the specific course by id

        $reviews = $course ? $course->reviews()->get()->toArray() : []; //get reviews

        $reviews = $course ? $course->reviews()->with('user')->get()->map(function ($review) {
            return [
                'rating' => $review->rating,
                'review' => $review->review,
                'student_name' => $review->user->name,
            ];
        })->toArray() : []; //return reviews with names of the users

        $professors = $course ? $course->professors()->get()->toArray() : []; //list of professors

        return view('livewire.course', [
            'course' => $course,
            'defaultImage' => asset('images/courses/no-image.jpg'),
            //'professors' => Professor::where
            'reviews' => $reviews,
            'professors' => $professors,
        ]);
    }
}
