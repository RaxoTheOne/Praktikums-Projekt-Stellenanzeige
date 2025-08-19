<?php

namespace Database\Factories;

use App\Models\JobListing;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobListingFactory extends Factory
{
	protected $model = JobListing::class;

	public function definition(): array
	{
		return [
			'title' => $this->faker->jobTitle(),
			'location' => $this->faker->city(),
			'description' => $this->faker->paragraphs(3, true),
			'type' => $this->faker->randomElement(['full-time', 'part-time', 'contract', 'internship']),
			'salary' => $this->faker->numberBetween(30000, 120000),
			'published_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
		];
	}
}


