<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subject>
 */
class SubjectFactory extends Factory
{
    protected $model = Subject::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = [
            'Pemrograman Web Lanjutan',
            'Pemrograman Web Dasar',
            'Pemrograman Lanjut'
        ];

        return [
            'name' => fake()->unique()->randomElement($subjects)
        ];
    }
}
