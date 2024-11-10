<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class Discover extends Component
{
    public $category = 'trending';

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $courses = $this->getCoursesByCategory($this->category);

        return view('livewire.discover', [
            'courses' => $courses,
            'category' => $this->category,
            'categories' => [
                'trending' => 'Trending',
                'newly_added' => 'Newly Added',
                'top_rated' => 'Top Rated',
                'most_popular' => 'Most Popular',
                'recently_reviewed' => 'Recently Reviewed',
            ],
        ]);
    }

    private function getCoursesByCategory($category)
    {
        // For now, ignore categories and fetch all courses
        return Course::all();
    }
}
