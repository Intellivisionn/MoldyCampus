<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;

class Professors extends Component
{
    public $category = 'top_rated';
    public $currentPage = 1;
    public $itemsPerPage = 4; //need to figure out how to set this from screensize later

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
        $professors = $this->getProfessorsByCategory($this->category);
        return view('livewire.professors', [
            'professors' => $professors,
            'category' => $this->category,
            'categories' => [
                'top_rated' => 'Top Rated',
                'newly_rated' => 'Newly Rated',
                'most_popular' => 'Most Popular',
                'most_liked' => 'Most Liked',
            ],
        ]);
    }

    private function getProfessorsByCategory($category)
    {
        // Replace this with actual logic to fetch professors by category
        $allProfessors = [
            'top_rated' => collect([
            ['name' => 'Dr. Emily Stone', 'department' => 'Literature', 'image' => 'no-image.jpg'],
            ['name' => 'Prof. John Carter', 'department' => 'Physics', 'image' => 'no-image.jpg'],
            ['name' => 'Dr. Lisa Ray', 'department' => 'Sociology', 'image' => 'no-image.jpg'],
            ['name' => 'Prof. Mark Evans', 'department' => 'Computer Science', 'image' => 'no-image.jpg'],
            ]),
            'newly_rated' => collect([
            ['name' => 'Dr. Emily Stone', 'department' => 'Literature', 'image' => 'no-image.jpg'],
            ['name' => 'Prof. John Carter', 'department' => 'Physics', 'image' => 'no-image.jpg'],
            ]),
            'most_popular' => collect([
            ['name' => 'Dr. Lisa Ray', 'department' => 'Sociology', 'image' => 'no-image.jpg'],
            ['name' => 'Prof. Mark Evans', 'department' => 'Computer Science', 'image' => 'no-image.jpg'],
            ]),
            'most_liked' => collect([
            ['name' => 'Dr. Emily Stone', 'department' => 'Literature', 'image' => 'no-image.jpg'],
            ['name' => 'Prof. John Carter', 'department' => 'Physics', 'image' => 'no-image.jpg'],
            ]),
        ];

        return $allProfessors[$category] ?? collect([]);
    }
}
