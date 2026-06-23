<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\JobPost;
use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
        'user_id' => User::inRandomOrder()->first()->id,
        'job_post_id' => JobPost::inRandomOrder()->first()->id,
        'status' => 'pending',
        'hours_per_day' => $this->faker->numberBetween(2, 8),
        'work_type' => $this->faker->randomElement(['onsite','remote','hybrid']),
        'cover_letter' => $this->faker->paragraph(),
        'applied_at' => now(),
    ];
    }
}
