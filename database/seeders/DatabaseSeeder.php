<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hapus user yang ada agar tidak duplikat saat seeding ulang
        Schema::disableForeignKeyConstraints();
        User::truncate();
        // Jika ada perintah truncate() untuk tabel lain (misalnya Category::truncate() atau Book::truncate()), taruh juga di sini
        Schema::enableForeignKeyConstraints();

        User::create([
            'name' => 'Admin Perpustakaan',
            'email' => 'admin@perpus.com',
            'password' => Hash::make('password'), // Password: password
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Petugas Perpustakaan',
            'email' => 'petugas@perpus.com',
            'password' => Hash::make('password'), // Password: password
            'role' => 'petugas',
        ]);

        // User::factory(10)->create(); // Bisa di-uncomment jika ingin user dummy tambahan
    }
}
