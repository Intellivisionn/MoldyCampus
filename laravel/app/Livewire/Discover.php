<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class Discover extends Component
{
     public $category = 'trending';

    public $currentPage = 1;

    public $itemsPerPage = 12; 

    public function setCategory($category)
    {
        $this->category = $category;
        $this->currentPage = 1;
    }

    public function nextPage()
{
    if ($this->currentPage < $this->getCoursesByCategory($this->category)->lastPage()) {
        $this->currentPage++;
    }
}

public function previousPage()
{
    if ($this->currentPage > 1) {
        $this->currentPage--;
    }
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
                    ->paginate($this->itemsPerPage, ['*'], 'page', $this->currentPage);

            case 'newly_added':
                return Course::orderBy('created_at', 'desc')
                    ->paginate($this->itemsPerPage, ['*'], 'page', $this->currentPage);

            case 'top_rated':
                return Course::withAvg('reviews', 'rating')
                    ->orderBy('reviews_avg_rating', 'desc')
                    ->paginate($this->itemsPerPage, ['*'], 'page', $this->currentPage);

            case 'most_popular':
                return Course::withCount('reviews')
                    ->orderBy('reviews_count', 'desc')
                    ->paginate($this->itemsPerPage, ['*'], 'page', $this->currentPage);

            case 'recently_reviewed':
                return Course::whereHas('reviews', function ($query) {
                    $query->orderBy('created_at', 'desc');
                })
                    ->paginate($this->itemsPerPage, ['*'], 'page', $this->currentPage);

            default:
                return Course::paginate($this->itemsPerPage, ['*'], 'page', $this->currentPage);
        }
    }
}
