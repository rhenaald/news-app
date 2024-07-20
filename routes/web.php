<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' =>'Home Page']);
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

Route::get('/hukum', function () {
    return view('hukum', ['title' =>'hukum Page']);
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
