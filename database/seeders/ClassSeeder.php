<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolClass::factory()->count(14)->create();
    }
}
