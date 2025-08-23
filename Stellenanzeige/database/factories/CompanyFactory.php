<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
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
        $germanCompanies = [
            'Siemens AG',
            'Volkswagen Group',
            'BMW Group',
            'Deutsche Bank',
            'Allianz SE',
            'BASF SE',
            'Daimler AG',
            'Bayer AG',
            'Adidas AG',
            'Deutsche Telekom',
            'SAP SE',
            'Mercedes-Benz',
            'Audi AG',
            'Porsche AG',
            'Bosch GmbH',
            'Continental AG',
            'Henkel AG',
            'Lufthansa Group',
            'Deutsche Post',
            'E.ON SE'
        ];

        $companyName = $this->faker->randomElement($germanCompanies);

        // Füge eine Nummer hinzu, um Eindeutigkeit zu gewährleisten
        $companyName = $companyName . ' - ' . $this->faker->numberBetween(1, 999);

        return [
            'name' => $companyName,
            'website' => $this->faker->optional(0.8)->url(),
            'email' => $this->faker->optional(0.9)->companyEmail(),
            'phone' => $this->faker->optional(0.7)->numerify('+49 ## #### ####'),
        ];
    }
}
