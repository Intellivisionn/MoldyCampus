<?php

namespace App\Livewire\Pages;

use App\Models\Course;
use Livewire\Component;

class Courses extends Component
{
    public $currentPage = 1;

    public $itemsPerPage = 12;

    public function nextPage()
    {
        $lastPage = $this->getLastPage();

        if ($this->currentPage < $lastPage) {
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
        $this->currentPage = min($this->currentPage, $this->getLastPage()); // Ensure currentPage does not exceed lastPage

        $courses = $this->getCourses();

        return view('livewire.pages.courses', [
            'courses' => $courses,
            'defaultImage' => asset('images/courses/no-image.jpg'),
        ]);
    }

    private function getCourses()
    {
        return Course::orderBy('name', 'asc')
            ->paginate($this->itemsPerPage, ['*'], 'page', $this->currentPage);
    }

    private function getLastPage()
    {
        // Temporarily get the last page from the query.
        return Course::paginate($this->itemsPerPage)->lastPage();
    }
}
