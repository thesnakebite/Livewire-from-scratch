<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('components.layouts.public')]
#[Title('Crear Articulo')]
class ArticleCreate extends Component
{
    use WithFileUploads;

    public ArticleForm $form;

    public function save()
    {
        $this->form->store();

        $this->redirect(Search::class , navigate: true);
    }


    public function render()
    {
        return view('livewire.article-create');
    }
}
