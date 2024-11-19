<?php

namespace App\Livewire;

use App\Models\Professor;
use Livewire\Component;

class Professors extends Component
{
    public $category = 'top_rated';

    public $itemsPerPage = 4;

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $professors = $this->getProfessorsByCategory($this->category);

        return view('livewire.professors', [
            'professors' => $professors,
            'category' => $this->category,
            'categories' => [
                'top_rated' => 'Top Rated',
                'most_reviewed' => 'Most Reviewed',
            ],
            'defaultImage' => asset('images/professors/no-image.jpg'),
        ]);
    }

    private function getProfessorsByCategory($category)
    {
        switch ($category) {
            case 'top_rated':
                return Professor::with(['courses' => function ($query) {
                    $query->with('reviews');
                }])
                ->get()
                ->sortByDesc(function ($professor) {
                    $totalRating = $professor->courses->sum(function ($course) {
                        return $course->reviews->avg('rating');
                    });
                    $totalCourses = $professor->courses->count();
                    return $totalCourses ? $totalRating / $totalCourses : 0;
                })
                ->take($this->itemsPerPage);

            case 'most_reviewed':
                return Professor::withCount(['courses as reviews_count' => function ($query) {
                    $query->withCount('reviews');
                }])
                    ->orderBy('reviews_count', 'desc')
                    ->take($this->itemsPerPage)
                    ->get();

            default:
                return Professor::take($this->itemsPerPage)->get();
        }
    }
}
