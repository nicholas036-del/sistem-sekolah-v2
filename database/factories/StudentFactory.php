<?php

namespace Database\Factories;

use App\Models\Major;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{   
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis'=> fake()->unique()->numerify('####'),
            'name'=> fake()->name(),
            'gender'=> fake()->randomElement(['Laki-laki','Perempuan']),
            'user_id' => User::factory(),
            'major_id' => Major::inRandomOrder()->first()->id,
            'class_id' => SchoolClass::inRandomOrder()->first()->id,
        ];
    }
}
