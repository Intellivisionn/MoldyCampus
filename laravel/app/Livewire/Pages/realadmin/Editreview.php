<?php

namespace App\Livewire\Pages\Realadmin;

use Livewire\Component;
use App\Models\CourseRating;

class Editreview extends Component
{
    public $reviewId;
    public $review;

    public function mount($reviewId)
    {
        $this->reviewId = $reviewId;
        $this->review = CourseRating::find($this->reviewId);
    }

    public function deleteReview($reviewId)
    {
        $review = CourseRating::find($reviewId);
        if ($review) {
            $review->delete();
            session()->flash('message', 'Review deleted successfully.');
            return redirect()->route('realadmin.edituser.show', ['userId' => $review->user_id]);
        }
    }

    public function clearReviewText($reviewId)
    {
        $review = CourseRating::find($reviewId);
        if ($review) {
            $review->review = '';
            $review->save();
            session()->flash('message', 'Review text cleared successfully.');
            $this->review = $review;
        }
    }

    public function goBack()
    {
        return redirect()->route('realadmin.edituser.show', ['userId' => $this->review->user_id]);
    }

    public function render()
    {
        return view('livewire.pages.realadmin.editreview', [
            'review' => $this->review,
        ]);
    }
}
