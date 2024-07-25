<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    // index
    public function index(): View
    {
        $posts = Post::with('author', 'category')->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // create
    public function create(): View
    {
        $categories = Category::all();
        $authors = User::all();
        return view('posts.create', compact('categories', 'authors'));
    }

    // store
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'author_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required|string',
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);

        // Jika slug sudah ada, tambahkan angka untuk menghindari duplikasi
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        Post::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'author_id' => $validated['author_id'],
            'category_id' => $validated['category_id'],
            'body' => $validated['body'],
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    // show
    public function show(int $id): View
    {
        // $post = Post::findOrFail($id);
        // return view('posts.show', compact('post'));
    }

    // edit
    public function edit(int $id): View
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $authors = User::all();
        return view('posts.edit', compact('post', 'categories', 'authors'));
    }

    // update
    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required|string',
        ]);
    
        $post = Post::findOrFail($id);
    
        $slug = $validated['slug'] ?? Str::slug($validated['title']);
    
        // Jika slug sudah ada, tambahkan angka untuk menghindari duplikasi
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
    
        $post->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'author_id' => $validated['author_id'],
            'category_id' => $validated['category_id'],
            'body' => $validated['body'],
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    // destroy
    public function destroy(int $id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil dihapus.');
    }
}
