<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('components.layouts.public')]
#[Title('Editar articulo')]
class ArticleEdit extends Component
{
    public ?Article $article;

    #[Validate('required|min:2|max:60')]
    public $title = '';

    #[Validate('required|min:6|max:200')]
    public $content = '';

    public function mount(Article $article)
    {
        $this->title = $article->title;
        $this->content = $article->content;

        $this->article = $article;
    }

    public function save()
    {
        $this->validate();

        $this->article->update(
            $this->only(['title', 'content'])
        );

        $this->redirect('/search', navigate: true);
    }

    public function messages()
    {
        return [
            'title.required' => 'El título es obligatorio',
            'title.min' => 'El título debe contener mínimo 2 caracteres',
            'title.max' => 'El título no puede exceder 60 caracteres',
            'content.required' => 'La descrición es obligatoría',
            'content.min' => 'La descrición debe contener mínimo 6 caracteres',
            'content.max' => 'La descrición debe contener maximo 200 caracteres',
        ];
    }

    public function render()
    {
        return view('livewire.article-edit');
    }
}
