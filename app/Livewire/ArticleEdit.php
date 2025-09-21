<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('components.layouts.public')]
#[Title('Editar articulo')]
class ArticleEdit extends Component
{
    use WithFileUploads;

    public ArticleForm $form;

    public function mount(Article $article)
    {
        $this->form->setArticle($article);
    }

    public function save()
    {
        $this->form->update();

        session()->flash('status', 'Artículo actualizado exitosamente.');

        $this->redirect(Search::class , navigate: true);
    }


    public function render()
    {
        return view('livewire.article-edit');
    }
}
