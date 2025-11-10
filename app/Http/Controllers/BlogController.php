<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog; // pastikan ini ada biar bisa akses data dari tabel blogs

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(8);
        return view('blog', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori' => 'nullable',
            'gambar' => 'image|file|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('images', 'public');
        }

        Blog::create($data);
        return redirect()->route('blogs.index')->with('success', 'Blog berhasil ditambahkan!');
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,JPG,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('images', 'public');
        }

        $blog->update($data);
        return redirect()->route('blogs.index')->with('success', 'Blog berhasil diperbarui!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog berhasil dihapus!');
    }
    public function show($id)
    {
    $blog = Blog::findOrFail($id);
    return view('blogs.show', compact('blog'));
    }

}
