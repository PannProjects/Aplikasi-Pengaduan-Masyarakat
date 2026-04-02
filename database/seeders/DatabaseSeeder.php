<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Petugas::create([
            'nik' => '1234567890123456',
            'nama' => 'Administrator',
            'username' => 'admin',
            'password' => bcrypt('password'), // or Hash::make('password')
            'telp' => '081234567890',
            'level' => 'admin',
        ]);
        
        // Masyarakat Dummy
        \App\Models\Petugas::create([
            'nik' => '1234567890123457',
            'nama' => 'Masyarakat Test',
            'username' => 'masyarakat',
            'password' => bcrypt('password'),
            'telp' => '081234567891',
            'level' => 'masyarakat',
        ]);
    }
}
