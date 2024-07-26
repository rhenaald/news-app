<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home Page',
        'posts' => Post::all()
    ]);
});


Route::resource('panel', DashboardController::class);

Route::get('/categories/{category:slug}', function (Category $category) {
    $sub_judul = $category->name ? ' Artikel in ' . $category->name : '';
    return view('home', [
        'sub_judul'=>$sub_judul,
        'title' => 'artikel in ' . $category->name,
        'posts' => $category->posts]);
});

// users
Route::get('/authors/{user:slug}', function (User $user) {
    $sub_judul = $user->name ? count($user->posts) .  ' Artikel by ' . $user->name : '';
    return view('home', [
        'sub_judul'=>$sub_judul,
        'title' => 'artikel by ' . $user->name,
        'posts' => $user->posts]);
});

// posts
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'title' => 'Single Post',
        'post' => $post
    ]);
});


Route::get('/profile', function () {
    return view('profile');
});
// another


Route::get('/terkini', function () {
    $posts = Post::latest()->take(5)->get();
    return view('terkini', ['title' =>'blog terkini']);
});


Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);
Route::resource('Home', HomeController::class);

Route::middleware(['role:admin|editor'])->group(function () {
    Route::view('/dashboard', 'dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class)->except('show');   
});
