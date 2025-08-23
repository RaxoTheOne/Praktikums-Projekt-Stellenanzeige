<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $germanCategories = [
            'Softwareentwicklung',
            'Marketing & Vertrieb',
            'Finanzen & Controlling',
            'Personalwesen',
            'Ingenieurwesen',
            'Medizin & Gesundheit',
            'Bildung & Forschung',
            'Handel & Logistik',
            'Medien & Design',
            'Recht & Verwaltung',
            'Kundenservice',
            'Produktion & Fertigung',
            'Qualitätsmanagement',
            'Projektmanagement',
            'Beratung & Consulting',
            'Forschung & Entwicklung',
            'Einkauf & Beschaffung',
            'Öffentlicher Dienst',
            'Tourismus & Gastronomie',
            'Umwelt & Nachhaltigkeit'
        ];

        $categoryName = $this->faker->randomElement($germanCategories);

        // Füge eine Nummer hinzu, um Eindeutigkeit zu gewährleisten
        $categoryName = $categoryName . ' ' . $this->faker->numberBetween(1, 999);

        return [
            'name' => $categoryName,
            'slug' => Str::slug($categoryName),
        ];
    }
}
