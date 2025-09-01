<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use App\Models\Article;
use Livewire\Component;

#[Layout('components.layouts.public')]
class ShowArticle extends Component
{
    public Article $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.show-article')
            ->title($this->article->title);
    }
}
