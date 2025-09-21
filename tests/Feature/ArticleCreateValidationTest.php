<?php

declare(strict_types=1);

use App\Livewire\ArticleCreate;
use Livewire\Livewire;

test('title validation works with custom messages in create form', function () {
    $component = Livewire::test(ArticleCreate::class)
        ->set('form.title', '') // Campo vacío
        ->set('form.content', 'Este es un contenido válido para el artículo')
        ->call('save')
        ->assertHasErrors(['form.title']);

    // Verificar que el mensaje personalizado aparece
    $errors = $component->instance()->getErrorBag()->toArray();
    expect($errors['form.title'][0])->toBe('El título es obligatorio');
});

test('title minimum length validation works in create form', function () {
    $component = Livewire::test(ArticleCreate::class)
        ->set('form.title', 'a') // Solo 1 carácter
        ->set('form.content', 'Este es un contenido válido para el artículo')
        ->call('save')
        ->assertHasErrors(['form.title']);

    // Verificar que el mensaje personalizado aparece
    $errors = $component->instance()->getErrorBag()->toArray();
    expect($errors['form.title'][0])->toBe('El título debe contener mínimo 2 caracteres');
});

test('title maximum length validation works in create form', function () {
    $component = Livewire::test(ArticleCreate::class)
        ->set('form.title', str_repeat('a', 51)) // 51 caracteres
        ->set('form.content', 'Este es un contenido válido para el artículo')
        ->call('save')
        ->assertHasErrors(['form.title']);

    // Verificar que el mensaje personalizado aparece
    $errors = $component->instance()->getErrorBag()->toArray();
    expect($errors['form.title'][0])->toBe('El título no puede exceder 50 caracteres');
});

test('content validation works with custom messages in create form', function () {
    $component = Livewire::test(ArticleCreate::class)
        ->set('form.title', 'Título válido')
        ->set('form.content', '') // Campo vacío
        ->call('save')
        ->assertHasErrors(['form.content']);

    // Verificar que el mensaje personalizado aparece
    $errors = $component->instance()->getErrorBag()->toArray();
    expect($errors['form.content'][0])->toBe('La descripción es obligatoria');
});

test('content minimum length validation works in create form', function () {
    $component = Livewire::test(ArticleCreate::class)
        ->set('form.title', 'Título válido')
        ->set('form.content', 'abc') // Solo 3 caracteres
        ->call('save')
        ->assertHasErrors(['form.content']);

    // Verificar que el mensaje personalizado aparece
    $errors = $component->instance()->getErrorBag()->toArray();
    expect($errors['form.content'][0])->toBe('La descripción debe contener mínimo 6 caracteres');
});

test('content maximum length validation works in create form', function () {
    $component = Livewire::test(ArticleCreate::class)
        ->set('form.title', 'Título válido')
        ->set('form.content', str_repeat('a', 501)) // 501 caracteres
        ->call('save')
        ->assertHasErrors(['form.content']);

    // Verificar que el mensaje personalizado aparece
    $errors = $component->instance()->getErrorBag()->toArray();
    expect($errors['form.content'][0])->toBe('La descripción debe contener máximo 500 caracteres');
});

test('successful article creation with valid data', function () {
    Livewire::test(ArticleCreate::class)
        ->set('form.title', 'Título válido del artículo')
        ->set('form.content', 'Este es un contenido válido para el artículo que tiene más de 6 caracteres')
        ->set('form.published', true)
        ->call('save')
        ->assertHasNoErrors();

    // Verificar que el artículo se creó
    $this->assertDatabaseHas('articles', [
        'title' => 'Título válido del artículo',
        'content' => 'Este es un contenido válido para el artículo que tiene más de 6 caracteres',
        'published' => true,
    ]);
});