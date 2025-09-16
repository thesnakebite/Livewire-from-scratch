<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class ArticleIndex extends Component
{
    use WithPagination;

    public $showOnlyPublished = false;

    #[Computed]
    public function articles()
    {
        $query = Article::query();

        if ($this->showOnlyPublished) {
            $query->where('published', 1);
        }

        return $query->paginate(8, pageName: 'articulos-pagina');
    }

    public function delete(Article $article)
    {
        if ($this->articles->count() < 8) {
            throw new \Exception("No");
        }

        $article->delete();
        unset($this->articles);
        cache()->forget('published-count');
    }

    public function showAll()
    {
        $this->showOnlyPublished = false;
        $this->resetPage(pageName: 'articulos-pagina');
    }

    public function showPublished()
    {
        $this->showOnlyPublished = true;
        $this->resetPage(pageName: 'articulos-pagina');
    }
}
