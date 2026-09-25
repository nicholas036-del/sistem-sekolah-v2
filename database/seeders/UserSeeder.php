<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
                'name' => 'Harnever',
                'password' => bcrypt('password'),
                'role' => 'teacher',
            ]
        );

        // user Student
        User::updateOrCreate(
            ['email' => $userStudentEmail],
            [
                'name' => 'Richie',
                'password' => bcrypt('password'),
                'role' => 'student',
            ]
        );
    }
}
