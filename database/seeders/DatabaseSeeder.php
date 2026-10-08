<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun untuk login
        User::firstOrCreate(
            ['email' => 'nicholas.036@ski.sch.id'],
            ['name' => 'Nicholas Richie Rainhart', 'password' => bcrypt('password123'), 'role' => 'admin']
        );

        // 3 siswa tetap seperti di video
        $tetap = [
            ['1001', 'Richard Marcell', 'L', '12 TKJ 1', 'TKJ'],
            ['1002', 'Budi', 'L', '12 AKL', 'AKL'],
            ['1003', 'Nina', 'P', '12 BID', 'BID'],
        ];

        foreach ($tetap as [$nis, $name, $gender, $class, $major]) {
            Student::factory()->create([
                'nis' => $nis,
                'name' => $name,
                'gender' => $gender,
                'class' => $class,
                'major' => $major,
            ]);
        }

        // 100 siswa acak, total 103
        Student::factory()->count(100)->create();
    }
}