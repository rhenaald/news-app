<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    // index
    public function index(): View
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    // create
    public function create(): View
    {
        return view('users.create');
    }

    // store
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi foto profil
        ]);

        $slug = Str::slug($validated['name']);

        // Jika slug sudah ada, tambahkan angka untuk menghindari duplikasi
        $originalSlug = $slug;
        $count = 1;
        while (User::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        // Siapkan data pengguna baru
        $userData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'slug' => $slug,
        ];

        // Redirect atau respon yang sesuai
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // show
    public function show(User $user) : view
    {
        $sub_judul = $user->name ? count($user->posts) . ' Artikel by ' . $user->name : '';
        return view('home', [
            'sub_judul' => $sub_judul,
            'title' => 'Artikel by ' . $user->name,
            'posts' => $user->posts
        ]);
    }

    // edit
    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    // update
    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi foto profil
        ]);
    
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $request->filled('password') ? Hash::make($validated['password']) : $user->password,
            'profile_photo_path' => $request->file('profile_photo') ? $request->file('profile_photo')->store('profile_photos') : $user->profile_photo_path,
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    // delete
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
