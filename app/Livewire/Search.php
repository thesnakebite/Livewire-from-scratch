<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;

#[Layout('components.layouts.public')]
#[Title('Search')]
class Search extends Component
{
    #[Validate('required')]
    public $searchText = '';
    public $results = [];
    public $placeholder = 'Buscar artículos...';

    public function updatedSearchText($value)
    {
        $this->reset('results');

        $this->validate();

        $searchTerm = "%{$value}%";

        $this->results = Article::where('title', 'LIKE', $searchTerm)->get();
    }

    #[On('clear-search')]
    public function clear()
    {
        $this->reset('results', 'searchText');
    }

    public function render()
    {
        return view('livewire.search', [
            'allArticles' => Article::all(),
        ]);
    }
}
