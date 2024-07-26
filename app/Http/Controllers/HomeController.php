<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('home', compact('posts'));
    }

    public function terkini()
    {
        $posts = Post::with(['author', 'category'])->latest()->get();
        return view('terkini', compact('posts'));
    }
}
