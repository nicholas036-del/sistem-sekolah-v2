<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTeacherEmail = 'Harnever@ski.sch.id';
        $userStudentEmail = 'Richie@ski.sch.id';

        // user Teacher
        User::updateOrCreate(
            ['email' => $userTeacherEmail],
            [
                'name'     => 'Harnever',
                'password' => bcrypt('password'),
                'role'     => 'teacher',
            ]
        );

        // user Student
        User::updateOrCreate(
            ['email' => $userStudentEmail],
            [
                'name'     => 'Richie',
                'password' => bcrypt('password'),
                'role'     => 'student',
            ]
        );

        // Buat 100 data siswa acak (via factory)
        Student::factory()->count(100)->create();
    }
}