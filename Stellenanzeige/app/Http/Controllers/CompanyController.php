<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = (int) request('per_page', 50);
        if ($perPage < 1) { $perPage = 1; }
        if ($perPage > 100) { $perPage = 100; }
        $companies = Company::orderBy('name')->paginate($perPage)->withQueryString();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->validated());
        return redirect()->route('companies.show', $company)->with('status', 'Firma erstellt');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $company->load(['jobListings' => function ($q) { $q->latest('id'); }]);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->validated());
        return redirect()->route('companies.show', $company)->with('status', 'Firma aktualisiert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('status', 'Firma gelöscht');
    }
}
