<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\City;
use App\Models\Region;
use App\Models\Company;
use App\Models\Category;
use App\Models\User;
use App\Models\JobPost;
use App\Models\Application;
use App\Models\Report;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 🌍 Location
        $country = Country::create(['name' => 'Syria']);

        $city = City::create([
            'name' => 'Damascus',
            'country_id' => $country->id
        ]);

        $region = Region::create([
            'name' => 'Mazza',
            'city_id' => $city->id
        ]);

        // 🏢 Companies (متنوعة)
        $companies = Company::factory(6)->create([
            'region_id' => $region->id
        ]);

        // 🏷️ Categories (مهمة جداً للتنوع)
        $categories = Category::insert([
            ['name' => 'Software Development', 'type' => '0'],
            ['name' => 'Graphic Design', 'type' => '0'],
            ['name' => 'Marketing', 'type' => '1'],
            ['name' => 'Content Writing', 'type' => '1'],
            ['name' => 'Data Entry', 'type' => '1'],
            ['name' => 'Customer Service', 'type' => '1'],
        ]);

        $categories = Category::all();

        // 👤 Users (أكثر لزيادة التنوع)
        $users = User::factory(15)->create();

        // 💼 Job Posts (تنوع حقيقي)
        $jobs = JobPost::factory(25)->create([
            'company_id' => fn () => $companies->random()->id,
            'category_id' => fn () => $categories->random()->id,
            'title' => fn () => fake()->randomElement([
                'Laravel Developer',
                'Vue.js Frontend Developer',
                'Graphic Designer',
                'Social Media Manager',
                'Data Entry Clerk',
                'Customer Support Agent',
                'Content Writer',
                'Mobile App Developer'
            ]),
            'work_type' => fn () => fake()->randomElement(['onsite','remote','hybrid']),
            'gender' => fn () => fake()->randomElement(['male','female','any']),
            'certificate' => fn () => fake()->randomElement(['none','diploma','bachelor']),
        ]);

        // 📝 Applications (تنوع + بدون تكرار)
        foreach ($users as $user) {

            $randomJobs = $jobs->random(rand(2, 6));

            foreach ($randomJobs as $job) {

                Application::firstOrCreate(
                    [
                        'user_id' => $user->id,
                        'job_post_id' => $job->id,
                    ],
                    [
                        'status' => fake()->randomElement(['pending','accepted','rejected']),
                        'hours_per_day' => rand(2, 8),
                        'work_type' => fake()->randomElement(['onsite','remote','hybrid']),
                        'cover_letter' => fake()->paragraph(3),
                        'applied_at' => now()->subDays(rand(0, 30)),
                    ]
                );
            }
        }

        // 🚨 Reports (تنوع أكبر)
        Report::factory(15)->create([
            'user_id' => fn () => $users->random()->id,
            'company_id' => fn () => $companies->random()->id,
            'status' => fn () => fake()->randomElement(['pending','reviewed','dismissed']),
            'reason' => fn () => fake()->randomElement([
                'Spam job posting',
                'Fake company profile',
                'Inappropriate content',
                'Scam attempt',
                'Wrong job description'
            ]),
        ]);
    }
}