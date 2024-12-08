<?php

namespace App\Livewire\Pages\Realadmin;

use Livewire\Component;
use App\Models\CourseRating;
use App\Models\User;

class Realadmin extends Component
{
    public $search = '';
    public $users = [];

    public function mount()
    {
        $this->users = User::all();
    }

    public function searchUsers()
    {
        $this->users = User::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->search) . '%'])->get();
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete();
            session()->flash('message', 'User deleted successfully.');
        }
        $this->searchUsers();
    }

    public function deleteReview($reviewId)
    {
        $review = CourseRating::find($reviewId);
        if ($review) {
            $review->delete();
            session()->flash('message', 'Review deleted successfully.');
        }
        $this->render();
    }

    public function editUser($userId)
    {
        return redirect()->route('realadmin.edituser.show', ['userId' => $userId]);
    }

    public function editReview($reviewId)
    {
        return redirect()->route('realadmin.editreview.show', ['reviewId' => $reviewId]);
    }

    public function render()
    {
        $reviews = CourseRating::latest()->take(3)->get();

        return view('livewire.pages.realadmin.realadmin', [
            'reviews' => $reviews,
        ]);
    }
}
