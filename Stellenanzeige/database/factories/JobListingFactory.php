<?php

namespace Database\Factories;

use App\Models\JobListing;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobListingFactory extends Factory
{
	protected $model = JobListing::class;

	public function definition(): array
	{
		$germanJobTitles = [
			'Softwareentwickler (m/w/d)',
			'Projektmanager (m/w/d)',
			'Marketing Manager (m/w/d)',
			'Vertriebsmitarbeiter (m/w/d)',
			'Controlling Spezialist (m/w/d)',
			'Personalreferent (m/w/d)',
			'Ingenieur für Maschinenbau (m/w/d)',
			'Kundenservice Mitarbeiter (m/w/d)',
			'Produktionsleiter (m/w/d)',
			'Qualitätsmanager (m/w/d)',
			'Berater (m/w/d)',
			'Forscher (m/w/d)',
			'Einkäufer (m/w/d)',
			'Logistiker (m/w/d)',
			'Designer (m/w/d)',
			'Analyst (m/w/d)',
			'Architekt (m/w/d)',
			'Pädagoge (m/w/d)',
			'Jurist (m/w/d)',
			'Mediziner (m/w/d)'
		];

		$germanCities = [
			'Berlin', 'Hamburg', 'München', 'Köln', 'Frankfurt am Main',
			'Stuttgart', 'Düsseldorf', 'Leipzig', 'Dortmund', 'Essen',
			'Bremen', 'Dresden', 'Hannover', 'Nürnberg', 'Duisburg',
			'Bochum', 'Wuppertal', 'Bielefeld', 'Bonn', 'Mannheim'
		];

		$germanJobDescriptions = [
			'Wir suchen einen motivierten Mitarbeiter für unser dynamisches Team. Sie werden in einem internationalen Umfeld arbeiten und haben die Möglichkeit, sich fachlich weiterzuentwickeln. Zu Ihren Aufgaben gehören die eigenständige Bearbeitung von Projekten sowie die Zusammenarbeit mit verschiedenen Abteilungen.',

			'Als Teil unseres erfolgreichen Unternehmens übernehmen Sie verantwortungsvolle Aufgaben in einem modernen Arbeitsumfeld. Wir bieten Ihnen eine attraktive Vergütung, flexible Arbeitszeiten und hervorragende Entwicklungsmöglichkeiten. Teamarbeit und Eigeninitiative sind bei uns gefragt.',

			'In dieser spannenden Position sind Sie für die Umsetzung strategischer Ziele verantwortlich. Sie arbeiten eng mit dem Management zusammen und haben direkten Kundenkontakt. Wir erwarten von Ihnen eine hohe Lernbereitschaft und die Fähigkeit, komplexe Sachverhalte verständlich zu vermitteln.',

			'Unser Unternehmen wächst kontinuierlich und wir suchen Verstärkung für unser Team. Sie werden in einem agilen Umfeld arbeiten und moderne Technologien einsetzen. Wir bieten Ihnen eine langfristige Perspektive und die Möglichkeit, innovative Lösungen zu entwickeln.',

			'Als erfahrener Fachmann unterstützen Sie uns bei der Weiterentwicklung unserer Prozesse. Sie arbeiten in einem kollegialen Team und haben die Chance, Ihre Ideen einzubringen. Wir legen Wert auf Qualität und kontinuierliche Verbesserung.'
		];

		$germanJobTypes = [
			'Vollzeit',
			'Teilzeit',
			'Befristet',
			'Praktikum',
			'Ausbildung',
			'Minijob',
			'Remote',
			'Hybrid'
		];

		return [
			'title' => $this->faker->randomElement($germanJobTitles) . ' - ' . $this->faker->company(),
			'location' => $this->faker->randomElement($germanCities),
			'description' => $this->faker->randomElement($germanJobDescriptions),
			'type' => $this->faker->randomElement($germanJobTypes),
			'salary' => $this->faker->numberBetween(30000, 120000),
			'published_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
		];
	}
}


