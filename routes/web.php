<?php

use App\Livewire\ArticleDashboard;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\ArticleEdit;
use App\Livewire\CategoryEdit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/articles/{slug}', function ($slug) {
    return view('articles', ['slug' => $slug]);
})->name('articles.show');

Route::get('/category/{slug}', function ($slug) {
    return view('category', ['slug' => $slug]);
})->name('category.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('dashboard/article', ArticleDashboard::class)->name('articles.dashboard');
Route::get('dashboard/article/{id}/edit', ArticleEdit::class)->name('articles.edit');
Route::get('dashboard/category/{id}/edit', CategoryEdit::class)->name('category.edit');

Route::get('/search', function () {
    $q = request('q');
    return view('search', ['q' => $q]);
})->name('search');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
