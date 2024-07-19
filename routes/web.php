<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' =>'Home Page']);
});

Route::get('/about', function () {
    return view('About', ['title' =>' Page']);
});

Route::get('/blog', function () {
    return view('blog', ['title' =>'blog Page']);
});

Route::get('/contact', function () {
    return view('contact', ['title' =>'contact Page']);
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
