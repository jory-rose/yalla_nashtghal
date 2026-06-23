<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Company;
use App\Models\reports;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'reason' => $this->faker->sentence(),
            'status' => 'pending',
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
        ];
    }
}
