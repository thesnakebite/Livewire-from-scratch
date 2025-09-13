<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleIndex extends Component
{
    use WithPagination;

    public function delete(Article $article)
    {
        $article->delete();
    }

    public function render()
    {
        return view('livewire.article-index', [
            'articles' => Article::paginate(8),
        ]);
    }
}
