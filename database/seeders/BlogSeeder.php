<?php

namespace Database\Seeders;
use App\Models\Blog;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::create([
            'judul' => 'Judul Blog Pertama',
            'isi' => 'Ini adalah isi konten blog pertama',
            'gambar' => 'eksternal.jpeg'
        ]);
    }
}
