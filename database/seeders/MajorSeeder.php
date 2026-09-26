<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    public function run(): void
    {
        $majors = ['AKL', 'TKJ', 'BID'];

        foreach ($majors as $major) {
            Major::firstOrCreate(['name' => $major]);
        }
    }
}