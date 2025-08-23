<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    /** @test */
    public function it_can_display_companies_index()
    {
        $user = User::factory()->create();
        $companies = Company::factory()->count(3)->create();

        $response = $this->actingAs($user)->get(route('companies.index'));

        $response->assertStatus(200);
        $response->assertViewIs('companies.index');
        $response->assertViewHas('companies');
    }

    /** @test */
    public function it_can_create_company()
    {
        $user = User::factory()->create();
        $companyData = [
            'name' => 'Test Company',
            'website' => 'https://test.com',
            'email' => 'test@test.com',
            'phone' => '+49 123 456789'
        ];

        $response = $this->actingAs($user)->post(route('companies.store'), $companyData);

        $response->assertRedirect(route('companies.show', Company::first()));
        $this->assertDatabaseHas('companies', $companyData);
    }

    /** @test */
    public function it_can_create_company_with_logo()
    {
        $user = User::factory()->create();
        $file = UploadedFile::fake()->image('company-logo.jpg');

        $companyData = [
            'name' => 'Test Company with Logo',
            'logo' => $file,
            'website' => 'https://test.com'
        ];

        $response = $this->actingAs($user)->post(route('companies.store'), $companyData);

        $response->assertRedirect();
        $this->assertDatabaseHas('companies', ['name' => 'Test Company with Logo']);

        $company = Company::first();
        $this->assertNotNull($company->logo);
        $this->assertTrue(Storage::disk('public')->exists($company->logo));
    }

    /** @test */
    public function it_can_update_company()
    {
        $user = User::factory()->create();
        $company = Company::factory()->create(['name' => 'Old Name']);

        $response = $this->actingAs($user)->put(route('companies.update', $company), [
            'name' => 'New Name',
            'website' => 'https://newwebsite.com'
        ]);

        $response->assertRedirect(route('companies.show', $company));
        $this->assertDatabaseHas('companies', ['name' => 'New Name']);
    }

    /** @test */
    public function it_can_delete_company()
    {
        $user = User::factory()->create();
        $company = Company::factory()->create();

        $response = $this->actingAs($user)->delete(route('companies.destroy', $company));

        $response->assertRedirect(route('companies.index'));
        $this->assertDatabaseMissing('companies', ['id' => $company->id]);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('companies.store'), []);

        $response->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function it_validates_logo_file_type()
    {
        $user = User::factory()->create();
        $file = UploadedFile::fake()->create('document.pdf', 100);

        $response = $this->actingAs($user)->post(route('companies.store'), [
            'name' => 'Test Company',
            'logo' => $file
        ]);

        $response->assertSessionHasErrors(['logo']);
    }
}
