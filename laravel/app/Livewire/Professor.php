<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Professor as p;

class Professor extends Component
{
    public function render()
    {
        $professorId = 1; //change logic of this after

        $professor = p::find($professorId); // find specific professor by id

        $courses = $professor ? $professor->courses()->get()->toArray() : [];

        $reviews = $professor->courseRatings(); //this section takes all of the courses and calculates
        $totalRatings = 0;                      //the average of the professor ratings by courses
        $totalRatingPoints = 0;
        foreach ($reviews as $review) {
            $totalRatings++;
            $totalRatingPoints += $review['rating'];
        }
        $averageRating = $totalRatings > 0 ? $totalRatingPoints / $totalRatings : 0;

        return view('livewire.professor', [
            'professor' => $professor,
            'courses' => $courses,
            'finalRating' => $averageRating,
        ]);
    }
}
