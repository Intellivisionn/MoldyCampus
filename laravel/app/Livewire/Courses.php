<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class Courses extends Component
{
    public $category = 'trending';

    public $itemsPerPage = 4;

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
            'categories' => [
                'trending' => 'Trending',
                'newly_added' => 'Newly Added',
                'top_rated' => 'Top Rated',
                'most_popular' => 'Most Popular',
                'recently_reviewed' => 'Recently Reviewed',
            ],
            'defaultImage' => asset('images/courses/no-image.jpg'),
        ]);
    }

    private function getCoursesByCategory($category)
    {
        switch ($category) {
            case 'trending':
                return Course::withCount(['reviews' => function ($query) {
                    $query->where('created_at', '>=', now()->subMonth());
                }])
                    ->orderBy('reviews_count', 'desc')
                    ->orderBy('name', 'asc')
                    ->take($this->itemsPerPage)
                    ->get();

            case 'newly_added':
                return Course::orderBy('created_at', 'desc')
                    ->take($this->itemsPerPage)
                    ->get();

            case 'top_rated':
                return Course::withAvg('reviews', 'rating')
                    ->orderBy('reviews_avg_rating', 'desc')
                    ->take($this->itemsPerPage)
                    ->get();

            case 'most_popular':
                return Course::withCount('reviews')
                    ->orderBy('reviews_count', 'desc')
                    ->take($this->itemsPerPage)
                    ->get();

            case 'recently_reviewed':
                return Course::whereHas('reviews', function ($query) {
                    $query->orderBy('created_at', 'desc');
                })
                    ->take($this->itemsPerPage)
                    ->get();

            default:
                return Course::take($this->itemsPerPage)->get();
        }
    }
}
