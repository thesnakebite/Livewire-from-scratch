<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\ArticleForm;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    public function downloadPhoto()
    {
        $filename = Str::slug($this->form->title) . '.png';

        return response()->download(
            Storage::disk('public')->path($this->form->photo_path),
            $filename
        );
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
