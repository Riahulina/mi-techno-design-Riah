<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Progja;
use App\Models\Feedback;
use Illuminate\Http\Request;

class InsightController extends Controller
{
    // Halaman insight
    public function index()
{
    $divisions = Division::with('progjas.feedbacks')->get();
    $progjas = Progja::with('division')->paginate(10); // 👈 bukan ->get()

    $totalProgja = Progja::count();
    $avgSuccess = Progja::avg('success_rate');
    $countSelesai = Progja::where('status', 'selesai')->count();
    $countBerjalan = Progja::where('status', 'sedang_berjalan')->count();
    $countBelum = Progja::where('status', 'belum_dilaksanakan')->count();

    $leaderboard = $divisions->map(fn($d) => [
        'name' => $d->name,
        'avg' => $d->progjas->avg('success_rate') ?? 0
    ])->sortByDesc('avg')->values();

    return view('admin.progjas.index', compact(
        'divisions',
        'progjas', // 👈 kirim ke view
        'totalProgja',
        'avgSuccess',
        'countSelesai',
        'countBerjalan',
        'countBelum',
        'leaderboard'
    ));
}


    // Method untuk submit rating/progja
    public function rate(Request $request, Progja $progja)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        Feedback::create([
            'progja_id' => $progja->id,
            'user_id' => auth()->id() ?? null, // optional, jika login ada
            'rating_manfaat' => $request->rating,
            'komentar' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Rating berhasil dikirim!');
    }
}
