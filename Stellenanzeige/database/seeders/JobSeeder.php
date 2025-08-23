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
        // Erstelle alle 15 deutschen Firmen
        $companies = Company::all();
        if ($companies->isEmpty()) {
            $companies = Company::factory()->count(15)->create();
        }

        // Erstelle alle 20 deutschen Kategorien
        $categories = Category::all();
        if ($categories->isEmpty()) {
            $categories = Category::factory()->count(20)->create();
        }

        // Erstelle alle 50 deutschen Stellenanzeigen
        JobListing::factory()->count(50)->make()->each(function ($job) use ($companies, $categories) {
            $job->company_id = $companies->random()->id;
            $job->save();

            // Weise 1-3 Kategorien zu
            $categoryIds = $categories->random(rand(1, 3))->pluck('id');
            $job->categories()->sync($categoryIds);
        });

        $this->command->info('Deutsche Dummy-Daten erfolgreich erstellt!');
        $this->command->info('- ' . $companies->count() . ' deutsche Firmen');
        $this->command->info('- ' . $categories->count() . ' deutsche Berufskategorien');
        $this->command->info('- ' . JobListing::count() . ' deutsche Stellenanzeigen');
    }
}
