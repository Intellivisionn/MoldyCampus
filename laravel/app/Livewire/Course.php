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
    public $categoryScores = [
        'overall' => 0,
        'course_material' => 0,
        'interactivity' => 0,
        'technology' => 0,
    ];
    public $reviewText = '';
    public $review;

    public function mount($courseId)
    {
        $this->courseId = $courseId;

        // Check if the user has already reviewed this course
        $this->review = CourseRating::where('course_id', $this->courseId)
                                     ->where('user_id', auth()->id())
                                     ->first();

        // If a review already exists, load its details
        if ($this->review) {
            $this->categoryScores['overall'] = $this->review->rating;
            $this->categoryScores['course_material'] = $this->review->course_material ?? 0;
            $this->categoryScores['interactivity'] = $this->review->interactivity ?? 0;
            $this->categoryScores['technology'] = $this->review->technology ?? 0;
            $this->reviewText = $this->review->review;
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

        $reviewsCount = count($reviews);
        $allReviews = array_sum(array_column($reviews, 'rating'));
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
            // $this->review->course_material = $this->categoryScores['course_material'];
            // $this->review->interactivity = $this->categoryScores['interactivity'];
            // $this->review->technology = $this->categoryScores['technology'];
            $this->review->review = $this->reviewText;
            $this->review->save();
        } else {
            CourseRating::create([
                'course_id' => $this->courseId,
                'user_id' => auth()->id(),
                'rating' => $this->categoryScores['overall'],
                'course_material' => $this->categoryScores['course_material'],
                'interactivity' => $this->categoryScores['interactivity'],
                'technology' => $this->categoryScores['technology'],
                'review' => $this->reviewText,
            ]);
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
    }
}