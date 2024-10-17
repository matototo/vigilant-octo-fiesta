<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use Faker\Provider\fr_CA\Address;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // 'address' => $this->faker->street_address(),
    // 'city_id' => City::factory(),
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'phone' => $this->faker->numerify('##########'),
            'email' => preg_replace('/@example\..*/', '@domain.com', $this->faker->unique()->safeEmail),
            'date_of_birth' => $this->faker->dateTimeBetween('1990-01-01', '2018-12-31')
            ->format('d/m/Y'),
            'city_id' => 2,
        ];
    }
}
