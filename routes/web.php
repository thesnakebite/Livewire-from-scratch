<?php

use App\Livewire\ArticleCreate;
use App\Livewire\ArticleEdit;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Greeter;
use Illuminate\Support\Facades\Route;
use App\Livewire\Search;
use App\Livewire\ShowArticle;
use App\Models\Article;

Route::get('/', Greeter::class)->name('home');
Route::get('search', Search::class)->name('search');
Route::get('article/{article}', ShowArticle::class);

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    Route::get('articles/create', ArticleCreate::class)->name('create.article');
    Route::get('articles/{article}/edit', ArticleEdit::class);
});

require __DIR__.'/auth.php';
