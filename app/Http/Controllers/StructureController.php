<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StructureController extends Controller
{
    public function index()
    {
        $structures = Structure::orderBy('order')->get();
        return view('structures.index', compact('structures'));
    }

    public function create()
    {
        return view('structures.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'order'    => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('structures', 'public');
        }

        Structure::create($data);

        // setelah simpan langsung pindah ke halaman about
        return redirect()->route('about')->with('success', 'Struktur berhasil ditambahkan.');
    }

    public function edit(Structure $structure)
    {
        // Ambil semua struktur untuk ditampilkan di edit.blade.php
        $structures = Structure::all();

        return view('structures.edit', compact('structure', 'structures'));
    }

    public function update(Request $request, Structure $structure)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'photo'    => 'nullable|image|mimes:jpg,JPG,heic,jpeg,png|max:2048',
            'order'    => 'nullable|integer',
        ]);
        
        if ($request->hasFile('photo')) {
            if ($structure->photo) {
                Storage::disk('public')->delete($structure->photo);
            }
            $data['photo'] = $request->file('photo')->store('structures', 'public');
        }

        $structure->update($data);

        return redirect()->route('about')->with('success', 'Struktur berhasil diperbarui.');
    }

    public function destroy(Structure $structure)
    {
        if ($structure->photo) {
            Storage::disk('public')->delete($structure->photo);
        }
        $structure->delete();

        return redirect()->route('about')->with('success', 'Struktur berhasil dihapus.');
    }

    // Halaman About urut sesuai hierarki
    public function about()
    {
        $kahim   = Structure::where('position', 'Kahim')->first();
        $wakahim = Structure::where('position', 'Wakahim')->first();
        $bph     = Structure::whereIn('position', ['Sekretaris', 'Bendahara'])->orderBy('order')->get();
        $kadiv   = Structure::where('position', 'Kepala Divisi')->orderBy('order')->get();

        return view('about', compact('kahim', 'wakahim', 'bph', 'kadiv'));
    }
}
