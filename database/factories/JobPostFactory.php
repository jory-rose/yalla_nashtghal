<?php

namespace Database\Factories;
use App\Models\Company;
use App\Models\Category;
use App\Models\job_posts;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<JobPost>
 */
class JobPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'company_id' => Company::factory(),
            'category_id' => Category::factory(),

            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(5),

            'hours_per_day' => $this->faker->numberBetween(2, 8),
            'location' => $this->faker->city(),

            'gender' => $this->faker->randomElement(['male', 'female', 'any']),
            'certificate' => $this->faker->randomElement(['none','diploma','bachelor','master','phd']),
            'work_type' => $this->faker->randomElement(['onsite','remote','hybrid']),

            'status' => 'open',

            'start_date' => now(),
            'end_date' => now()->addMonth(),
        ];
    }
}
