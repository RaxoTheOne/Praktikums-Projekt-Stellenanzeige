<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_company()
    {
        $company = Company::factory()->create([
            'name' => 'Test Company',
            'website' => 'https://test.com',
            'email' => 'test@test.com',
            'phone' => '+49 123 456789'
        ]);

        $this->assertInstanceOf(Company::class, $company);
        $this->assertEquals('Test Company', $company->name);
        $this->assertEquals('https://test.com', $company->website);
        $this->assertEquals('test@test.com', $company->email);
        $this->assertEquals('+49 123 456789', $company->phone);
    }

    /** @test */
    public function it_has_job_listings_relationship()
    {
        $company = Company::factory()->create();

        $this->assertTrue(method_exists($company, 'jobListings'));
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\HasMany::class, $company->jobListings());
    }

    /** @test */
    public function it_has_logo_url_attribute()
    {
        $company = Company::factory()->create(['logo' => 'company-logos/test-logo.jpg']);

        $this->assertTrue($company->logo_url);
        $this->assertStringContainsString('storage/company-logos/test-logo.jpg', $company->logo_url);
    }

    /** @test */
    public function it_returns_default_logo_when_no_logo_set()
    {
        $company = Company::factory()->create(['logo' => null]);

        $this->assertStringContainsString('default-company.png', $company->logo_url);
    }

    /** @test */
    public function it_can_update_company()
    {
        $company = Company::factory()->create(['name' => 'Old Name']);

        $company->update(['name' => 'New Name']);

        $this->assertEquals('New Name', $company->fresh()->name);
    }

    /** @test */
    public function it_can_delete_company()
    {
        $company = Company::factory()->create();

        $companyId = $company->id;
        $company->delete();

        $this->assertDatabaseMissing('companies', ['id' => $companyId]);
    }
}
