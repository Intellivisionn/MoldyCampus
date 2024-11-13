<?php

namespace App\Livewire;

use App\Models\Professor;
use Livewire\Component;

class DiscoverProfessors extends Component
{
    public $currentPage = 1;

    public $itemsPerPage = 8;

    public function nextPage()
    {
        if ($this->currentPage < $this->getProfessors()->lastPage()) {
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
        $professors = $this->getProfessors();

        return view('livewire.discoverProfessors', [
            'professors' => $professors,
            'defaultImage' => asset('images/professors/no-image.jpg'),
        ]);
    }

    private function getProfessors()
    {
        return Professor::orderBy('name', 'asc')
            ->paginate($this->itemsPerPage, ['*'], 'page', $this->currentPage);
    }
}
