<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::all();
        return view('Divisions', compact('divisions'));
    }
    public function create()
    {
        return view('Divisions', ['mode' => 'create']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('divisions', 'public');
        }

        Division::create($validated);

        return redirect()->route('divisions.index')->with('success', 'Divisi berhasil dibuat.');
    }

    public function edit(Division $division)
    {
        return view('Divisions', ['mode' => 'edit', 'division' => $division]);
    }

    public function update(Request $request, Division $division)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            if ($division->image && Storage::disk('public')->exists($division->image)) {
                Storage::disk('public')->delete($division->image);
            }
            $validated['image'] = $request->file('image')->store('divisions', 'public');
        }

        $division->update($validated);

        return redirect()->route('divisions.index')->with('success', 'Divisi berhasil diupdate.');
    }

    public function destroy(Division $division)
    {
        if ($division->image && Storage::disk('public')->exists($division->image)) {
            Storage::disk('public')->delete($division->image);
        }

        $division->delete();

        return redirect()->route('divisions.index')->with('success', 'Divisi berhasil dihapus.');
    }

    public function show(Division $division)
    {
        $division->load('members'); // eager load members
        // compute kepala, ketua, anggota like you did in previous show
        $kepala = $division->members->where('role', 'Kepala Divisi')->first();
        $ketua1 = $division->members->where('role', 'Ketua Tim')->where('team_number', 1)->first();
        $ketua2 = $division->members->where('role', 'Ketua Tim')->where('team_number', 2)->first();
        $anggota1 = $division->members->where('role', 'Anggota')->where('team_number', 1);
        $anggota2 = $division->members->where('role', 'Anggota')->where('team_number', 2);

        return view('divisions.show', compact('division', 'kepala', 'ketua1', 'ketua2', 'anggota1', 'anggota2'));
    }
}
