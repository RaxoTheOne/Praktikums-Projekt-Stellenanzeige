<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\JobListing;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            JobListing::latest()->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $job = JobListing::create($request->validated());

        return response()->json($job, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(JobListing $job)
    {
        return response()->json($job);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, JobListing $job)
    {
        $job->update($request->validated());

        return response()->json($job);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobListing $job)
    {
        $job->delete();

        return response()->noContent();
    }
}
