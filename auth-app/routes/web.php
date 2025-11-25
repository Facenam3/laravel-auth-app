<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get("/posts/{id}/post", [PostController::class, 'post'])->name('posts.post');
Route::get("/posts/add-post", [PostController::class, 'addPost'])->name("posts.add-post");
Route::post("/posts/create", [PostController::class, 'create'])->name("posts.create");
Route::get("/posts/{id}/edit", [PostController::class, 'edit'])->name("posts.edit");
Route::put("/posts/{id}/update", [PostController::class, 'update'])->name("posts.update");
Route::delete("/post/{id}/delete", [PostController::class, 'destroy'])->name("posts.delete");


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
