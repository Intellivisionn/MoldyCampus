<?php

namespace App\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $query;

    public function updatedQuery()
    {
        if (strlen($this->query) > 2) {
            return redirect()->route('search.results', ['query' => $this->query]);
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}
