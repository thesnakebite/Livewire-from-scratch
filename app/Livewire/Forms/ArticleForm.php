<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Article;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;

class ArticleForm extends Form
{
    public Article $article;

    #[Locked]
    public int $id;

    #[Validate('required', message: 'El título es obligatorio')]
    #[Validate('min:2', message: 'El título debe contener mínimo 2 caracteres')]
    #[Validate('max:50', message: 'El título no puede exceder 50 caracteres')]
    public $title = '';

    #[Validate('required', message: 'La descripción es obligatoria')]
    #[Validate('min:6', message: 'La descripción debe contener mínimo 6 caracteres')]
    #[Validate('max:500', message: 'La descripción debe contener máximo 500 caracteres')]
    public $content = '';

    #[Validate('nullable')]
    #[Validate('image', message: 'El archivo debe ser una imagen')]
    #[Validate('max:1024', message: 'La imagen no puede ser mayor a 1MB')]
    public $photo;

    public $published = false;
    public $notifications = [];
    public $allowNotifications = false;
    public $photo_path = '';

    public function setArticle(Article $article)
    {
        $this->id = $article->id;
        $this->title = $article->title;
        $this->content = $article->content;
        $this->published = $article->published;
        $this->notifications = $article->notifications ?? [];
        $this->photo_path = $article->photo_path;

        $this->allowNotifications = count($this->notifications) > 0;

        $this->article = $article;
    }

    public function store()
    {
        $this->validate();

        if (!$this->allowNotifications) {
            $this->notifications = [];
        }

        if ($this->photo) {
            $this->photo_path = $this->photo->storePublicly('article_photos', ['disk' => 'public']);
        }

        Article::create($this->only(['title', 'content', 'published', 'notifications', 'photo_path']));

        cache()->forget('published-count');
    }
    public function update()
    {
        $this->validate();

        if (!$this->allowNotifications) {
            $this->notifications = [];
        }

        if ($this->photo) {
            $this->photo_path = $this->photo->storePublicly('article_photos', ['disk' => 'public']);
        }

        $this->article->update(
            $this->only(['title', 'content', 'published', 'notifications', 'photo_path'])
        );

        cache()->forget('published-count');
    }

}
