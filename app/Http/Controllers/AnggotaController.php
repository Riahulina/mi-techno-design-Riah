<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    // Tampilkan semua anggota (untuk halaman About)
        public function index(Request $request)
    {
        $query = Anggota::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('divisi', 'like', '%' . $request->search . '%')
                ->orWhere('jabatan', 'like', '%' . $request->search . '%')
                ->orWhere('kelas', 'like', '%' . $request->search . '%');
        }

        $anggotas = $query->orderBy('nama')->paginate(10);

        return view('anggota.index', compact('anggotas'));
    }


    // Form tambah anggota
    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        return view('anggota.create');
    }

    // Simpan data anggota baru
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'divisi' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
        ]);

        Anggota::create($validated);

        return redirect()->route('about')->with('success', 'Anggota berhasil ditambahkan!');
    }

    // Form edit anggota
    public function edit($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $anggota = Anggota::findOrFail($id);
        return view('anggota.edit', compact('anggota'));
    }

    // Update data anggota
    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'divisi' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($validated);

        return redirect()->route('about')->with('success', 'Data anggota berhasil diperbarui!');
    }

    // Hapus data anggota
    public function destroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('about')->with('success', 'Data anggota berhasil dihapus!');
    }
}
