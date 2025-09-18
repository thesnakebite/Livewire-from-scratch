<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.public')]
#[Title('Crear Articulo')]
class ArticleCreate extends Component
{
    public ArticleForm $form;

    public function save()
    {
        $this->form->store();

        $this->redirect(Search::class , navigate: true);
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
        return view('livewire.article-create');
    }
}
