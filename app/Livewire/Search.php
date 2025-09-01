<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Search extends Component
{
    #[Validate('required')]
    public $searchText = '';
    public $results = [];

    public function updatedSearchText($value)
    {
        $this->reset('results');

        $this->validate();

        $searchTerm = "%{$value}%";

        $this->results = Article::where('title', 'LIKE', $searchTerm)->get();
    }

    public function render()
    {
        return view('livewire.search');
    }
}
