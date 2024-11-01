<?php

namespace App\Livewire;

use Livewire\Component;

class Courses extends Component
{
    public $category = 'trending';

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $courses = $this->getCoursesByCategory($this->category);
        return view('livewire.courses', [
            'courses' => $courses,
            'category' => $this->category,

            // replace with database logic later

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
        // Replace this with actual logic to fetch courses by category later
        $allCourses = [
            'trending' => [
                ['title' => 'Economics', 'code' => 'ECON 201', 'image' => 'economics.jpg'],
                ['title' => 'Biology', 'code' => 'BIOL 304', 'image' => 'biology.jpg'],
            ],
            'newly_added' => [
                ['title' => 'Computer Science', 'code' => 'CSCI 101', 'image' => 'cs.jpg'],
                ['title' => 'Philosophy', 'code' => 'PHIL 410', 'image' => 'philosophy.jpg'],
            ],
            'top_rated' => [
                ['title' => 'Mathematics', 'code' => 'MATH 101', 'image' => 'math.jpg'],
                ['title' => 'Physics', 'code' => 'PHYS 201', 'image' => 'physics.jpg'],
            ],
            'most_popular' => [
                ['title' => 'Chemistry', 'code' => 'CHEM 101', 'image' => 'chemistry.jpg'],
                ['title' => 'History', 'code' => 'HIST 101', 'image' => 'history.jpg'],
            ],
            'recently_reviewed' => [
                ['title' => 'Literature', 'code' => 'LIT 101', 'image' => 'literature.jpg'],
                ['title' => 'Art', 'code' => 'ART 101', 'image' => 'art.jpg'],
            ],
        ];

        return $allCourses[$category] ?? [];
    }
}
