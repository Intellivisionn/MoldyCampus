<?php

namespace App\Livewire;

use App\Models\Professor;
use Livewire\Component;

class Professors extends Component
{
    public $category = 'most_popular';

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
                'most_popular' => 'Most Reviewed',
                'most_liked' => 'Most Liked',
            ],
            'defaultImage' => asset('images/professors/no-image.jpg'),
        ]);
    }

    private function getProfessorsByCategory($category)
    {
        switch ($category) {
            case 'most_popular':
                return Professor::withCount(['courses as reviews_count' => function ($query) {
                    $query->withCount('reviews');
                }])
                    ->orderBy('reviews_count', 'desc')
                    ->take($this->itemsPerPage)
                    ->get();

            case 'most_liked':
                return Professor::withCount(['courses as reviews_count' => function ($query) {
                    $query->whereHas('reviews', function ($query) {
                        $query->where('rating', '>', 3); // Assuming rating > 3 is considered a 'like'
                    });
                }])
                    ->orderBy('reviews_count', 'desc')
                    ->take($this->itemsPerPage)
                    ->get();

            default:
                return Professor::take($this->itemsPerPage)->get();
        }
    }
}
