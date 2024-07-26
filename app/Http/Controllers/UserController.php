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
        // $roles = Role::all();
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
            'role' => 'required|exists:roles,name',
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
            'role' => $validated['role'],
            'slug' => $slug,
        ];

        $user = new User;
        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->password = $userData['password'];
        $user->slug = $userData['slug'];
        $user = User::create($userData);
        $user->assignRole($userData['role']);

        $user->save();
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
        // $roles = Role::all();
        return view('users.edit', compact('user'));
    }

    // update
    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
            'role' => 'required|exists:roles,name',
            'profile_photo_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }
        $slug = Str::slug($validated['name']);

        // Jika slug sudah ada, tambahkan angka untuk menghindari duplikasi
        $originalSlug = $slug;
        $count = 1;
        while (User::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        
        $userData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'slug' => $slug,
        ];

        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->password = $userData['password'];
        $user->slug = $userData['slug'];

        $user->syncRoles($userData['role']);

        $user->save();
    
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    // delete
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
