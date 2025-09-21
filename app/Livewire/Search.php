<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Isolate;

#[Layout('components.layouts.public')]
#[Title('Search')]
#[Isolate]
class Search extends Component
{
    #[Validate('required')]
    #[Url(as: 'q', except: '', history: true)]
    public $searchText = '';
    public $placeholder = 'Buscar artículos...';

    #[On('clear-search')]
    public function clear()
    {
        $this->reset('searchText');
    }

    // Alternative approach using queryString() method (Livewire 2/3 compatible)
    // protected function queryString()
    // {
    //     return [
    //         'searchText' => [
    //             'as' => 'q',
    //             'history' => true,
    //             'except' => ''
    //         ]
    //     ];
    // }

    public function render()
    {
        return view('livewire.search', [
            'results' => Article::where('title', 'LIKE', "%{$this->searchText}%")->get()
        ]);
    }
}
