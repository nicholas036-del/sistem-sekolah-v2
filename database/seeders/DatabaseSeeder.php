<?php

namespace Database\Seeders;

use App\Models\Major;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $majors = [];
        foreach (['AKL', 'TKJ', 'BID'] as $m) {
            $majors[$m] = Major::firstOrCreate(['name' => $m]);
        }

        $class = SchoolClass::firstOrCreate(['name' => 'XII TKJ 1']);

        $user = User::firstOrCreate(
            ['email' => 'nicholas@example.com'],
            [
                'name' => 'Nicholas Richie Rainhart',
                'password' => bcrypt('password'),
                'role' => 'student',
            ]
        );
        Student::firstOrCreate(
            ['nis' => '1001'],
            [
                'name' => 'Nicholas Richie Rainhart',
                'gender' => 'L',
                'user_id' => $user->id,
                'major_id' => $majors['TKJ']->id,
                'class_id' => $class->id,
            ]
        );
    }
}