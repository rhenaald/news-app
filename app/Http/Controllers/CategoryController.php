<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Support\Str; 

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryController extends Controller
{
    // index
    public function index() : View
    {
        $categories = Category::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    // create
    public function create(): View
    {
        return view('categories.create');
    }

    // store
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:255',
        ]);

        // Buat slug dari nama
        $slug = Str::slug($validated['name']);

        //Jika slug sudah ada, tambahkan angka untuk menghindari duplikasi
        $originalSlug = $slug;
        $count = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        // Simpan data kategori ke dalam database
        Category::create([
            'name' => $validated['name'],
            'color' => $validated['color'],
            'slug' => $slug,
        ]);

        // Redirect ke daftar kategori dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dibuat.');
    }

    // show
    public function show(Category $category)
    {
        $sub_judul = $category->name ? ' Artikel in ' . $category->name : '';
        
        return view('home', [
            'sub_judul' => $sub_judul,
            'title' => 'Artikel in ' . $category->name,
            'posts' => $category->posts,
            'categories' => Category::all() // Mengirimkan kategori untuk digunakan di header
        ]);}

    // edit
    public function edit(string $id): View
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // update
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $slug = Str::slug($validated['name']);
        $originalSlug = $slug;
        $count = 1;
        
        while (Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $category->update([
            'name' => $validated['name'],
            'color' => $validated['color'],
            'slug' => $slug,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    // delete
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
