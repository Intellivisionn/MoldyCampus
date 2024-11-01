<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;

class Courses extends Component
{
    public $category = 'trending';
    public $currentPage = 1;
    public $itemsPerPage = 3;

    public function setCategory($category)
    {
        $this->category = $category;
        $this->currentPage = 1;
    }

    public function nextPage()
    {
        $this->currentPage++;
    }

    public function previousPage()
    {
        $this->currentPage--;
    }

    public function render()
    {
        $courses = $this->getCoursesByCategory($this->category);
        return view('livewire.courses', [
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
        // Replace this with actual logic to fetch courses by category
        $allCourses = [
            'trending' => collect([
            ['title' => 'Economics', 'code' => 'ECON 201', 'image' => 'no-image.jpg'],
            ['title' => 'Biology', 'code' => 'BIOL 304', 'image' => 'no-image.jpg'],
            ['title' => 'Psychology', 'code' => 'PSYC 101', 'image' => 'no-image.jpg'],
            ['title' => 'Sociology', 'code' => 'SOC 202', 'image' => 'no-image.jpg'],
            ['title' => 'History', 'code' => 'HIST 101', 'image' => 'no-image.jpg'],
            ['title' => 'Philosophy', 'code' => 'PHIL 410', 'image' => 'no-image.jpg'],
            ['title' => 'Mathematics', 'code' => 'MATH 101', 'image' => 'no-image.jpg'],
            ['title' => 'Physics', 'code' => 'PHYS 201', 'image' => 'no-image.jpg'],
            ]),
            'newly_added' => collect([
            ['title' => 'Computer Science', 'code' => 'CSCI 101', 'image' => 'no-image.jpg'],
            ['title' => 'Philosophy', 'code' => 'PHIL 410', 'image' => 'no-image.jpg'],
            ]),
            'top_rated' => collect([
            ['title' => 'Mathematics', 'code' => 'MATH 101', 'image' => 'no-image.jpg'],
            ['title' => 'Physics', 'code' => 'PHYS 201', 'image' => 'no-image.jpg'],
            ]),
            'most_popular' => collect([
            ['title' => 'Chemistry', 'code' => 'CHEM 101', 'image' => 'no-image.jpg'],
            ['title' => 'History', 'code' => 'HIST 101', 'image' => 'no-image.jpg'],
            ]),
            'recently_reviewed' => collect([
            ['title' => 'Literature', 'code' => 'LIT 101', 'image' => 'no-image.jpg'],
            ['title' => 'Art', 'code' => 'ART 101', 'image' => 'no-image.jpg'],
            ]),
        ];

        return $allCourses[$category] ?? collect([]);
    }
}
