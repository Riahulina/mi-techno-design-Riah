<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Structure;
use App\Models\Anggota;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data struktur
        $structures = Structure::orderBy('order')->get();

        // Query dasar untuk tabel anggota
        $query = Anggota::query();

        // Fitur pencarian
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('divisi', 'like', '%' . $request->search . '%')
                ->orWhere('jabatan', 'like', '%' . $request->search . '%')
                ->orWhere('kelas', 'like', '%' . $request->search . '%');
        }

        // Ambil data anggota (dengan pagination)
        $anggotas = $query->orderBy('nama')->paginate(10);

        // Kirim ke view
        return view('about', compact('structures', 'anggotas'));
    }
}
