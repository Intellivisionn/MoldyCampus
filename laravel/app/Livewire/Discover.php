<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class Discover extends Component
{
    public $currentPage = 1;

    public $itemsPerPage = 12;

    public function nextPage()
    {
        if ($this->currentPage < $this->getCourses()->lastPage()) {
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
        $courses = $this->getCourses();

        return view('livewire.discover', [
            'courses' => $courses,
            'defaultImage' => asset('images/courses/no-image.jpg'),
        ]);
    }

    private function getCourses()
    {
        return Course::orderBy('name', 'asc')
            ->paginate($this->itemsPerPage, ['*'], 'page', $this->currentPage);
    }
}
