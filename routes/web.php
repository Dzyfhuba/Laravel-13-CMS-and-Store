<?php

use Illuminate\Support\Facades\Route;

// Route::inertia('/', 'Welcome')->name('home');
Route::get('/', [
    App\Http\Controllers\HomeController::class,
    'index'
])->name('home');

Route::get('products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('products/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');

Route::get('services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');
Route::get('services/{service}', [App\Http\Controllers\ServiceController::class, 'show'])->name('services.show');

Route::get('projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('projects/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');

Route::get('blogs', [App\Http\Controllers\BlogController::class, 'index'])->name('blogs.index');
Route::get('blogs/{blog:slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blogs.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';
