<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\DivisionMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DivisionMemberController extends Controller
{
    public function create(Division $division)
    {
        return view('division_members.create', compact('division'));
    }

    public function store(Request $request, Division $division)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string',
            'team_number' => 'nullable|integer',
            'team_name' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('members', 'public');
        }

        $validated['division_id'] = $division->id;

        DivisionMember::create($validated);

        return redirect()->route('divisions.show', $division->id)->with('success', 'Anggota ditambahkan.');
    }

    public function edit(Division $division, DivisionMember $member)
    {
        if ($member->division_id !== $division->id) {
            abort(404);
        }
        return view('division_members.edit', compact('division', 'member'));
    }

    public function update(Request $request, Division $division, DivisionMember $member)
    {
        if ($member->division_id !== $division->id) {
            abort(404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string',
            'team_number' => 'nullable|integer',
            'team_name' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            if ($member->image && Storage::disk('public')->exists($member->image)) {
                Storage::disk('public')->delete($member->image);
            }
            $validated['image'] = $request->file('image')->store('members', 'public');
        }

        $member->update($validated);

        return redirect()->route('divisions.show', $division->id)->with('success', 'Perubahan anggota disimpan.');
    }

    public function destroy(Division $division, DivisionMember $member)
    {
        if ($member->division_id !== $division->id) {
            abort(404);
        }

        if ($member->image && Storage::disk('public')->exists($member->image)) {
            Storage::disk('public')->delete($member->image);
        }

        $member->delete();

        return redirect()->route('divisions.show', $division->id)->with('success', 'Anggota dihapus.');
    }
}
