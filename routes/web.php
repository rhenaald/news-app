<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/home', function () {
    return view('home', [
        'title' => 'Home Page',
        'posts' => Post::all()
    ]);
});

// Route::post('/posts/upload-image', [PostController::class, 'uploadImage'])->name('posts.uploadImage');

// kategori

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


// Route::get('/terkini', function () {
//     return view('terkini', ['title' =>'blog terkini']);
// });

// Route::get('/populer', function () {
//     return view('terpopuler', ['title' =>'blog terpopuler']);
// });

// Route::get('/top-news', function () {
//     return view('top-news', ['title' =>'top-news Page']);
// });

// Route::get('/pilihan-editor', function () {
//     return view('pilihan-editor', ['title' =>'pilihan-editor Page']);
// });

// Route::get('/politik', function () {
//     return view('politik', ['title' =>'politik Page']);
// });

// Route::get('/hiburan', function () {
//     return view('hiburan', ['title' =>'hukum Page']);
// });

// Route::get('/pendidikan', function () {
//     return view('pendidikan', ['title' =>'pendidikan Page']);
// });

// Route::get('/olahraga', function () {
//     return view('olahraga', ['title' =>'olahraga Page']);
// });

// Route::get('/ekonomi', function () {
//     return view('ekonomi', ['title' =>'ekonomi Page']);
// });


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware(['role:admin|editor'])->group(function () {
    Route::view('/dashboard', 'dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
});

// Route::view('/admin', 'test')->middleware('role:admin');
// Route::view('/editor', 'test')->middleware('role:editor');
// Route::view('/standard', 'test')->middleware('role:standard');