<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\JobListing;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = (int) request('per_page', 50);
        if ($perPage < 1) { $perPage = 1; }
        if ($perPage > 100) { $perPage = 100; }
        $jobs = JobListing::with(['company', 'categories'])
            ->orderBy('id', 'desc')
            ->paginate($perPage)
            ->withQueryString();
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('jobs.create', compact('companies', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $validated = $request->validated();
        $categoryIds = $validated['category_ids'] ?? [];
        unset($validated['category_ids']);

        // Create company on the fly if company_name provided
        if (empty($validated['company_id']) && $request->filled('company_name')) {
            $company = Company::firstOrCreate(['name' => $request->string('company_name')]);
            $validated['company_id'] = $company->id;
        }
        unset($validated['company_name']);

        $job = JobListing::create($validated);
        if (!empty($categoryIds)) {
            $job->categories()->sync($categoryIds);
        }

        return redirect()->route('jobs.index')->with('status', 'Job erstellt');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobListing $job)
    {
        $job->load(['company', 'categories']);
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobListing $job)
    {
        $companies = Company::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $job->load('categories');
        return view('jobs.edit', compact('job', 'companies', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, JobListing $job)
    {
        $validated = $request->validated();
        $categoryIds = $validated['category_ids'] ?? null;
        unset($validated['category_ids']);

        if (array_key_exists('company_name', $validated) && empty($validated['company_id']) && $request->filled('company_name')) {
            $company = Company::firstOrCreate(['name' => $request->string('company_name')]);
            $validated['company_id'] = $company->id;
        }
        unset($validated['company_name']);

        $job->update($validated);
        if ($categoryIds !== null) {
            $job->categories()->sync($categoryIds);
        }

        return redirect()->route('jobs.show', $job)->with('status', 'Job aktualisiert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobListing $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('status', 'Job gelöscht');
    }
}
