<?php

namespace App\Livewire\Pages\Realadmin;

use Livewire\Component;
use App\Models\User;
use App\Models\CourseRating;

class Edituser extends Component
{
    public $userId;
    public $user;    // Variable to hold the user object
    public $userReviews;

    // Mount function to handle the user ID passed from the route
    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = User::find($this->userId);
        $this->userReviews = CourseRating::where('user_id', $this->userId)->get();
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete();
            session()->flash('message', 'User deleted successfully.');
        }
        return redirect()->route('realadmin.edituser.show', ['userId' => $this->userId]);
    }

    public function deleteReview($reviewId)
    {
        $review = CourseRating::find($reviewId);
        if ($review) {
            $review->delete();
            session()->flash('message', 'Review deleted successfully.');
        }
        return redirect()->route('realadmin.edituser.show', ['userId' => $this->userId]);
    }

    public function editReview($reviewId)
    {
        return redirect()->route('realadmin.editreview.show', ['reviewId' => $reviewId]);
    }

    public function render()
    {
        return view('livewire.pages.realadmin.edituser', [
            'user' => $this->user,
            'reviews' => $this->userReviews,
        ]);
    }
}
