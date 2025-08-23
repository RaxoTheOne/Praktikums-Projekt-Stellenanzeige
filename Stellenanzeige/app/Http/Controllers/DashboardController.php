<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobListing;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $companiesCount = Company::count();
            $jobsCount = JobListing::count();
            $categoriesCount = Category::count();
            $usersCount = User::count();

            $recentCompanies = Company::latest()->take(5)->get();
            $recentJobs = JobListing::latest()->take(5)->get();

            return view('dashboard.index', compact(
                'companiesCount',
                'jobsCount',
                'categoriesCount',
                'usersCount',
                'recentCompanies',
                'recentJobs'
            ));
        } catch (\Exception $e) {
            // Fallback-Werte bei Fehlern
            return view('dashboard.index', [
                'companiesCount' => 0,
                'jobsCount' => 0,
                'categoriesCount' => 0,
                'usersCount' => 0,
                'recentCompanies' => collect(),
                'recentJobs' => collect()
            ]);
        }
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        if (!$query) {
            return redirect()->route('dashboard.index');
        }

        try {
            $companies = Company::where('name', 'like', "%{$query}%")->get();
            $jobs = JobListing::where('title', 'like', "%{$query}%")->get();
            $categories = Category::where('name', 'like', "%{$query}%")->get();

            return view('dashboard.search', compact('query', 'companies', 'jobs', 'categories'));
        } catch (\Exception $e) {
            return view('dashboard.search', [
                'query' => $query,
                'companies' => collect(),
                'jobs' => collect(),
                'categories' => collect()
            ]);
        }
    }

    public function export()
    {
        return response()->json(['message' => 'Export funktioniert']);
    }
}
