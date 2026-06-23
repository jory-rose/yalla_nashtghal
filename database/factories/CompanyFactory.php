<?php

namespace Database\Factories;

use App\Models\companies;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<companies>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
                return [
            'name' => $this->faker->company(),
            'identity' => $this->faker->numerify('#########'),
            'image' => null,
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->companyEmail(),
            'commercial_record' => 'CR-' . $this->faker->numberBetween(100, 999),
            'license' => 'LIC-' . $this->faker->numberBetween(100, 999),
            'password' => Hash::make('password'),
            'region_id' => Region::factory(),
            'joined_at' => now(),
        ];

    }
}
