<?php

namespace App\Livewire;

use Livewire\Component;

class ArticleIndex extends Component
{
    public $articles = [];

    public function render()
    {
        return view('livewire.article-index');
    }
}
