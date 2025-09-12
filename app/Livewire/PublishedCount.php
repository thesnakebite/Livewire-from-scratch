<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy]
class PublishedCount extends Component
{
    public $count = 0;

    public function mount()
    {
        sleep(3);

        $this->count = Article::where('published', 1)->count();
    }

    public function placeholder()
    {
        return view('livewire.placeholder', [
            'message' => 'Cargando contador de publicaciones...'
        ]);
    }

    public function render()
    {
        return view('livewire.published-count');
    }
}
