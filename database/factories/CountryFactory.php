<?php

namespace Database\Factories;

use App\Models\countries;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
   
        return [
            'name' => 'Country ' . $this->faker->country(),
        ];
    
    }
}
