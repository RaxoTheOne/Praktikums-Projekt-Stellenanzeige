<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Company;
use App\Models\Category;
use App\Models\JobListing;
use App\Policies\CompanyPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\JobListingPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Registriere Policies
        Gate::policy(Company::class, CompanyPolicy::class);
        Gate::policy(Category::class, CategoryPolicy::class);
        Gate::policy(JobListing::class, JobListingPolicy::class);
    }
}
