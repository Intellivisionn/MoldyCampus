<?php

namespace App\Livewire;

use App\Models\Course as c;
use Livewire\Component;
use App\Models\CourseRating;
use Illuminate\Support\Facades\Auth;

class Course extends Component
{
    public $courseId;

    public $isModalOpen = false;
    public $categoryScores = [];
    public $reviewText = '';
    public $review = null;

    public function mount($courseId) //should add this mount so we can get the id each time
    {
        $this->courseId = $courseId;

        $this->review = $this->getReview();
        if ($this->review) {
            $this->categoryScores = [
                'overall' => $this->review['rating'],
                'course_material' => 0,
                'interactivity' => 0,
                'technology' => 0,
            ];
            $this->reviewText = $this->review['review'];
        } else {
            $this->categoryScores = [
                'overall' => 0,
                'course_material' => 0,
                'interactivity' => 0,
                'technology' => 0,
            ];
            $this->reviewText = '';
        }
    }

    public function render()
    {
        $course = c::find($this->courseId);

        $reviews = $course ? $course->reviews()->get()->toArray() : []; //get reviews

        $reviews = $course ? $course->reviews()->with('user')->get()->map(function ($review) {
            return [
                'rating' => $review->rating,
                'review' => $review->review,
                'student_name' => $review->user->name,
            ];
        })->toArray() : []; //return reviews with names of the users

        $professors = $course ? $course->professors()->get()->toArray() : []; //list of professors

        $reviewsCount = 0;
        $allReviews = 0;
        foreach ($reviews as $review) {
            $reviewsCount += 1;
            $allReviews += $review['rating'];
        }

        $finalRating = $reviewsCount > 0 ? round($allReviews / $reviewsCount, 2) : 0;

        return view('livewire.course', [
            'course' => $course,
            //'defaultImage' => asset('images/courses/no-image.jpg'),
            'reviews' => $reviews,
            'professors' => $professors,
            'finalRating' => $finalRating,
            'categoryScores' => $this->categoryScores,
            'review' => $this->reviewText,
        ]);
    }

    private function getReview() {
        return CourseRating::where('user_id', Auth::id())->where('course_id', $this->courseId)->first();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function setRating($category, $score)
    {
        $this->categoryScores[$category] = $score;
    }

    public function submitRating()
    {
        if ($this->review) {
            $this->review->rating = $this->categoryScores['overall'];
            $this->review->review = $this->reviewText;
            $this->review->save();
        } else {
            $courseRating = new CourseRating();
            $courseRating->course_id = $this->courseId;
            $courseRating->user_id = auth()->id();
            $courseRating->rating = $this->categoryScores['overall'];
            // $courseRating->course_material = $this->categoryScores['course_material'];
            // $courseRating->interactivity = $this->categoryScores['interactivity'];
            // $courseRating->technology = $this->categoryScores['technology'];
            $courseRating->review = $this->reviewText;
            $courseRating->save();
        }
        $this->closeModal();
    }

    public function removeRating()
    {
        if ($this->review) {
            $this->review->delete();
            $this->review = null;
            $this->categoryScores = [
                'overall' => 0,
                'course_material' => 0,
                'interactivity' => 0,
                'technology' => 0,
            ];
            $this->reviewText = '';
        }
        $this->closeModal();
    }
}