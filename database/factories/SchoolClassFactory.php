<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SchoolClass>
 */
class SchoolClassFactory extends Factory
{
    protected $model = SchoolClass::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $schoolClasses = [
            '10 AKL',
            '11 AKL',
            '12 AKL',
            '10 TKJ 1',
            '10 TKJ 2',
            '11 TKJ 1',
            '11 TKJ 2',
            '12 TKJ 1',
            '12 TKJ 2',
            '12 TKJ 3',
            '10 BID 1',
            '10 BID 2',
            '11 BID',
            '12 BID',
        ];
        return [
            'name' => fake()->unique()->randomElement($schoolClasses),
        ];
    }
}