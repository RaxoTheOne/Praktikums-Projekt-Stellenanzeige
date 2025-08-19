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
        $jobs = JobListing::with(['company', 'categories'])->latest()->paginate(10);
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
