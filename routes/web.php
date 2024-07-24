<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home Page',
        'posts' => Post::all()
    ]);
});

// kategori
Route::resource('categories', \App\Http\Controllers\CategoryController::class);

Route::get('/categories/{category:slug}', function (Category $category) {
    $sub_judul = $category->name ? ' Artikel in ' . $category->name : '';
    return view('home', [
        'sub_judul'=>$sub_judul,
        'title' => 'artikel in ' . $category->name,
        'posts' => $category->posts]);
});

// Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');



Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'title' => 'Single Post',
        'post' => $post
    ]);
});

Route::get('/authors/{user:id}', function (User $user) {
    $sub_judul = $user->name ? count($user->posts) .  ' Artikel by ' . $user->name : '';
    return view('home', [
        'sub_judul'=>$sub_judul,
        'title' => 'artikel by ' . $user->name,
        'posts' => $user->posts]);
});

Route::get('/terkini', function () {
    return view('terkini', ['title' =>'blog terkini']);
});

Route::get('/populer', function () {
    return view('terpopuler', ['title' =>'blog terpopuler']);
});

Route::get('/top-news', function () {
    return view('top-news', ['title' =>'top-news Page']);
});

Route::get('/pilihan-editor', function () {
    return view('pilihan-editor', ['title' =>'pilihan-editor Page']);
});

Route::get('/politik', function () {
    return view('politik', ['title' =>'politik Page']);
});

Route::get('/hiburan', function () {
    return view('hiburan', ['title' =>'hukum Page']);
});

Route::get('/pendidikan', function () {
    return view('pendidikan', ['title' =>'pendidikan Page']);
});

Route::get('/olahraga', function () {
    return view('olahraga', ['title' =>'olahraga Page']);
});

Route::get('/ekonomi', function () {
    return view('ekonomi', ['title' =>'ekonomi Page']);
});

Route::get('/main', function () {
    return view('test', ['title' =>'ekonomi Page']);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
