<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    use App\Models\Divisi;

    public function run(): void
    {
        // Seeder user (boleh tetap kalau perlu)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    
        // Seeder divisi
        Divisi::create(['nama' => 'Business Development']);
        Divisi::create(['nama' => 'Public Relations']);
        Divisi::create(['nama' => 'Human Resources']);
    }
}
    