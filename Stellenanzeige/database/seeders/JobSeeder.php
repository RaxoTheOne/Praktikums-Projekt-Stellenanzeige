<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobListing;
use App\Models\Company;
use App\Models\Category;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = Company::all();
        if ($companies->isEmpty()) {
            $companies = Company::factory()->count(5)->create();
        }

        JobListing::factory()->count(20)->make()->each(function ($job) use ($companies) {
            $job->company_id = $companies->random()->id;
            $job->save();

            $categoryIds = Category::inRandomOrder()->limit(rand(1, 3))->pluck('id');
            if ($categoryIds->isEmpty()) {
                $categoryIds = Category::factory()->count(3)->create()->pluck('id');
            }
            $job->categories()->sync($categoryIds);
        });
    }
}
