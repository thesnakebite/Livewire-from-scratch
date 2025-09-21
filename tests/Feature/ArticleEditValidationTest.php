<?php

declare(strict_types=1);

use App\Livewire\ArticleEdit;
use App\Models\Article;
use Livewire\Livewire;

test('title validation in edit form shows custom messages', function () {
    // Crear un artículo para editar
    $article = Article::factory()->create([
        'title' => 'Título original',
        'content' => 'Contenido original del artículo',
        'published' => false,
    ]);

    $component = Livewire::test(ArticleEdit::class, ['article' => $article])
        ->set('form.title', 'a') // Solo 1 carácter
        ->set('form.content', 'Este es un contenido válido para el artículo')
        ->call('save')
        ->assertHasErrors(['form.title']);

    // Debug: mostrar todos los errores
    $errors = $component->instance()->getErrorBag()->toArray();
    dump('Errores en edición:', $errors);

    // Verificar que el mensaje personalizado aparece
    expect($errors['form.title'][0])->toBe('El título debe contener mínimo 2 caracteres');
});

test('compare create vs edit validation behavior', function () {
    // Test de creación
    $createComponent = Livewire::test(\App\Livewire\ArticleCreate::class)
        ->set('form.title', 'a')
        ->set('form.content', 'Contenido válido')
        ->call('save');

    $createErrors = $createComponent->instance()->getErrorBag()->toArray();

    // Test de edición
    $article = Article::factory()->create();
    $editComponent = Livewire::test(ArticleEdit::class, ['article' => $article])
        ->set('form.title', 'a')
        ->set('form.content', 'Contenido válido')
        ->call('save');

    $editErrors = $editComponent->instance()->getErrorBag()->toArray();

    dump('Crear errores:', $createErrors);
    dump('Editar errores:', $editErrors);

    // Ambos deberían tener el mismo mensaje de error
    expect($createErrors['form.title'][0])->toBe($editErrors['form.title'][0]);
});