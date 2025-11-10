<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Division;
use App\Models\Structure;
use App\Models\Blog;

class AdminController extends Controller
{
    public function index()
    {
        // Hitung total data dari tiap tabel
        $anggotaCount = Anggota::count();
        $divisiCount = Division::count();
        $strukturCount = Structure::count();
        $blogCount = Blog::count();

        // Kirim hasil ke view
        return view('admin.dashboard', compact(
            'anggotaCount',
            'divisiCount',
            'strukturCount',
            'blogCount'
        ));
    }
}
