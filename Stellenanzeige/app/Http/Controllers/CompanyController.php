<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('name')->paginate(50);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(StoreCompanyRequest $request)
    {
        $data = $request->validated();

        // Logo-Upload verarbeiten
        if ($request->hasFile('logo')) {
            try {
                $logoPath = $request->file('logo')->store('company-logos', 'public');
                $data['logo'] = $logoPath;
            } catch (\Exception $e) {
                // Bei Fehler trotzdem Firma erstellen, aber ohne Logo
                unset($data['logo']);
            }
        }

        $company = Company::create($data);
        return redirect()->route('companies.show', $company)->with('status', 'Firma erstellt');
    }

    public function show(Company $company)
    {
        $company->load(['jobListings' => function ($q) { $q->latest('id'); }]);
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $data = $request->validated();

        // Logo-Upload verarbeiten
        if ($request->hasFile('logo')) {
            try {
                // Altes Logo löschen
                if ($company->logo) {
                    Storage::disk('public')->delete($company->logo);
                }

                $logoPath = $request->file('logo')->store('company-logos', 'public');
                $data['logo'] = $logoPath;
            } catch (\Exception $e) {
                // Bei Fehler trotzdem aktualisieren, aber ohne Logo
                unset($data['logo']);
            }
        }

        $company->update($data);
        return redirect()->route('companies.show', $company)->with('status', 'Firma aktualisiert');
    }

    public function destroy(Company $company)
    {
        // Logo löschen
        if ($company->logo) {
            try {
                Storage::disk('public')->delete($company->logo);
            } catch (\Exception $e) {
                // Logo-Löschung schlägt fehl, aber Firma wird trotzdem gelöscht
            }
        }

        $company->delete();
        return redirect()->route('companies.index')->with('status', 'Firma gelöscht');
    }
}
