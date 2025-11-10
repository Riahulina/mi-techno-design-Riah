<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Divisi;

class DivisiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Divisi Internal', 'gambar' => 'internal.jpeg', 'deskripsi' => 'Dokumentasi program kerja Divisi Internal'],
            ['nama' => 'Badan Pengurus Harian', 'gambar' => 'bph.jpeg', 'deskripsi' => 'Badan Pengurus Harian'],
            ['nama' => 'Divisi Eksternal', 'gambar' => 'eksternal.jpeg', 'deskripsi' => 'Dokumentasi program kerja Divisi Eksternal'],
            ['nama' => 'Divisi PSDM', 'gambar' => 'psdm.jpeg', 'deskripsi' => 'Dokumentasi program kerja Divisi PSDM'],
            ['nama' => 'Divisi Business Development', 'gambar' => 'bd.jpeg', 'deskripsi' => 'Dokumentasi program kerja Divisi Business Development'],
            ['nama' => 'Divisi IPTEK', 'gambar' => 'iptek.jpeg', 'deskripsi' => 'Dokumentasi program kerja Divisi IPTEK'],
        ];

        foreach ($data as $d) {
            Divisi::create($d);
        }
    }
}
