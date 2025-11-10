<?php

namespace App\Http\Controllers;

use App\Models\Progja;
use App\Models\Division;
use Illuminate\Http\Request;

class ProgjaController extends Controller
{
    // Tampilkan daftar progja
    public function index()
    {
        $progjas = Progja::with('division')->latest()->paginate(10);
        $divisions = Division::with('progjas.feedbacks')->get();
        return view('admin.progjas.index', compact('progjas','divisions'));
    }

    // Form tambah progja
    public function create()
    {
        $divisions = Division::all();
        return view('admin.progjas.create', compact('divisions'));
    }

    // Simpan progja baru
    public function store(Request $request)
    {
        $request->validate([
            'division_id' => 'required|exists:divisions,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:belum_dilaksanakan,sedang_berjalan,selesai',
            'success_rate' => 'nullable|numeric|min:0|max:100',
        ]);

        // Sesuaikan dengan nama kolom database
        Progja::create([
            'division_id' => $request->division_id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'success_rate' => $request->success_rate,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('progjas.index')->with('success', 'Program kerja berhasil ditambahkan!');
    }

    // Form edit progja
    public function edit(Progja $progja)
    {
        $divisions = Division::all();
        return view('admin.progjas.edit', compact('progja', 'divisions'));
    }

    // Update progja
    public function update(Request $request, Progja $progja)
    {
        $request->validate([
            'division_id' => 'required|exists:divisions,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:belum_dilaksanakan,sedang_berjalan,selesai',
            'success_rate' => 'nullable|numeric|min:0|max:100',
        ]);

        $progja->update([
            'division_id' => $request->division_id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'success_rate' => $request->success_rate,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('progjas.index')->with('success', 'Program kerja berhasil diperbarui!');
    }

    // Hapus progja
    public function destroy(Progja $progja)
    {
        $progja->delete();
        return redirect()->route('progjas.index')->with('success', 'Program kerja berhasil dihapus!');
    }
}
