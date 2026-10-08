<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    private const CLASSES = [
        '10 AKL', '10 BID', '10 TKJ 1', '10 TKJ 2',
        '11 AKL', '11 TKJ 1', '11 TKJ 2',
        '12 AKL', '12 BID', '12 TKJ 1', '12 TKJ 2', '12 TKJ 3',
    ];

    public function definition(): array
    {
        $gender = fake()->randomElement(['L', 'P']);

        return [
            'nis' => fake()->unique()->numerify('####'),
            'name' => fake()->name($gender === 'L' ? 'male' : 'female'),
            'gender' => $gender,
            'class' => fake()->randomElement(self::CLASSES),
            'major' => fake()->randomElement(['AKL', 'BID', 'TKJ']),
            'user_id' => User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => bcrypt('password'),
                'role' => 'student',
            ])->id,
        ];
    }
}