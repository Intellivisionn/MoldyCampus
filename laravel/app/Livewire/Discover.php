<?php

namespace App\Livewire;

use Livewire\Component;

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
        // Your existing logic to fetch courses by category
        $allCourses = [
            'trending' => collect([
                ['title' => 'Economics', 'code' => 'ECON 201', 'image' => 'economics.jpg'],
                ['title' => 'Biology', 'code' => 'BIOL 304', 'image' => 'no-image.jpg'],
                ['title' => 'Psychology', 'code' => 'PSYC 101', 'image' => 'no-image.jpg'],
                ['title' => 'Sociology', 'code' => 'SOC 202', 'image' => 'no-image.jpg'],
                ['title' => 'History', 'code' => 'HIST 101', 'image' => 'no-image.jpg'],
                ['title' => 'Philosophy', 'code' => 'PHIL 410', 'image' => 'no-image.jpg'],
                ['title' => 'Mathematics', 'code' => 'MATH 101', 'image' => 'no-image.jpg'],
                ['title' => 'Physics', 'code' => 'PHYS 201', 'image' => 'no-image.jpg'],
            ]),
            // ... other categories
        ];

        return $allCourses[$category] ?? collect([]);
    }
}
