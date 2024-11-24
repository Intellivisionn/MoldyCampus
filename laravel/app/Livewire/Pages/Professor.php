<?php

namespace App\Livewire\Pages;


use Livewire\Component;
use App\Models\Professor as p;

class Professor extends Component
{
    public $professorId;

    public function mount($professorId) //should add this mount so we can get the id each time
    {
        $this->professorId = $professorId; //$courseId;
    }
    public function render()
    {
        $professor = p::find($this->professorId); // find specific professor by id

        $courses = $professor ? $professor->courses()->get()->toArray() : [];

        $reviews = $professor->courseRatings(); //this section takes all of the courses and calculates
        $totalRatings = 0;                      //the average of the professor ratings by courses
        $totalRatingPoints = 0;
        foreach ($reviews as $review) {
            $totalRatings++;
            $totalRatingPoints += $review['rating'];
        }
        $averageRating = $totalRatings > 0 ? round($totalRatingPoints / $totalRatings, 2) : 0;

        return view('livewire.pages.professor', [
            'professor' => $professor,
            'courses' => $courses,
            'finalRating' => $averageRating,
        ]);
    }
}
