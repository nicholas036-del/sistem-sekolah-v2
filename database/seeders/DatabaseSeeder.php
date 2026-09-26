<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ClassSeeder::class,     // isi data classes dulu
            MajorSeeder::class,     // isi data majors dulu
            UserSeeder::class,      // buat akun guru/siswa contoh (opsional)
            StudentSeeder::class,   // baru generate banyak siswa, aman karena Major & Class sudah ada
        ]);
    }
}