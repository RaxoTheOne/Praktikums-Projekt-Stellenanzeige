@extends('layouts.app')

@section('title','Suchergebnisse')

@section('content')
    <div class="panel">
        <div class="page-header">
            <h1 style="margin:0; color: #10b981;">🔍 Suchergebnisse</h1>
            <a class="button secondary" href="{{ route('dashboard.index') }}">
                <span style="margin-right: 0.5rem;">←</span>Zurück zum Dashboard
            </a>
        </div>

        <div class="search-info">
            <p style="color: #e5e7eb; margin-bottom: 1rem;">
                Suchergebnisse für: <strong style="color: #10b981;">"{{ $query }}"</strong>
            </p>
        </div>

        <div class="search-results">
            @if($companies->count() > 0)
                <div class="result-section">
                    <h3 style="color: #10b981; margin-bottom: 1rem;">🏢 Firmen ({{ $companies->count() }})</h3>
                    <div class="result-grid">
                        @foreach($companies as $company)
                            <div class="result-card">
                                <div class="result-header">
                                    <h4 class="result-title">
                                        <a href="{{ route('companies.show', $company) }}" class="result-link">
                                            {{ $company->name }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="result-content">
                                    @if($company->website)
                                        <div class="result-item">
                                            <span class="result-label">Website:</span>
                                            <a href="{{ $company->website }}" target="_blank" class="result-link">
                                                {{ $company->website }}
                                            </a>
                                        </div>
                                    @endif
                                    @if($company->email)
                                        <div class="result-item">
                                            <span class="result-label">Email:</span>
                                            <span class="result-text">{{ $company->email }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($jobs->count() > 0)
                <div class="result-section">
                    <h3 style="color: #10b981; margin-bottom: 1rem;">💼 Stellenanzeigen ({{ $jobs->count() }})</h3>
                    <div class="result-grid">
                        @foreach($jobs as $job)
                            <div class="result-card">
                                <div class="result-header">
                                    <h4 class="result-title">
                                        <a href="{{ route('jobs.show', $job) }}" class="result-link">
                                            {{ $job->title }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="result-content">
                                    @if($job->company)
                                        <div class="result-item">
                                            <span class="result-label">Firma:</span>
                                            <a href="{{ route('companies.show', $job->company) }}" class="result-link">
                                                {{ $job->company->name }}
                                            </a>
                                        </div>
                                    @endif
                                    <div class="result-item">
                                        <span class="result-label">Standort:</span>
                                        <span class="result-text">{{ $job->location }}</span>
                                    </div>
                                    <div class="result-item">
                                        <span class="result-label">Typ:</span>
                                        <span class="result-text">{{ $job->job_type }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($categories->count() > 0)
                <div class="result-section">
                    <h3 style="color: #10b981; margin-bottom: 1rem;">🏷️ Kategorien ({{ $categories->count() }})</h3>
                    <div class="result-grid">
                        @foreach($categories as $category)
                            <div class="result-card">
                                <div class="result-header">
                                    <h4 class="result-title">
                                        <a href="{{ route('categories.show', $category) }}" class="result-link">
                                            {{ $category->name }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="result-content">
                                    <div class="result-item">
                                        <span class="result-label">Slug:</span>
                                        <span class="result-text">{{ $category->slug }}</span>
                                    </div>
                                    @if($category->description)
                                        <div class="result-item">
                                            <span class="result-label">Beschreibung:</span>
                                            <span class="result-text">{{ $category->description }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($companies->count() == 0 && $jobs->count() == 0 && $categories->count() == 0)
                <div class="no-results">
                    <div class="no-results-icon">🔍</div>
                    <h3 style="color: #10b981;">Keine Ergebnisse gefunden</h3>
                    <p style="color: #9ca3af;">
                        Für Ihre Suche nach "{{ $query }}" wurden keine Ergebnisse gefunden.
                    </p>
                    <div class="no-results-actions">
                        <a href="{{ route('dashboard.index') }}" class="button primary">Zurück zum Dashboard</a>
                        <a href="{{ route('companies.create') }}" class="button secondary">Neue Firma erstellen</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

<style>
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #10b981;
}

.search-info {
    background: #1f2937;
    border: 1px solid #374151;
    border-radius: 8px;
    padding: 1rem;
    margin-bottom: 2rem;
}

.search-results {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.result-section {
    background: #1f2937;
    border: 1px solid #374151;
    border-radius: 8px;
    padding: 1.5rem;
}

.result-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1rem;
}

.result-card {
    background: #374151;
    border: 1px solid #4b5563;
    border-radius: 6px;
    padding: 1rem;
    transition: all 0.2s;
}

.result-card:hover {
    border-color: #10b981;
    background: #4b5563;
    transform: translateY(-2px);
}

.result-header {
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid #4b5563;
}

.result-title {
    margin: 0;
    font-size: 1.1rem;
}

.result-content {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.result-item {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 1rem;
}

.result-label {
    color: #9ca3af;
    font-weight: 500;
    font-size: 0.875rem;
    min-width: 80px;
}

.result-text {
    color: #e5e7eb;
    font-size: 0.875rem;
}

.result-link {
    color: #10b981;
    text-decoration: none;
    font-weight: 500;
}

.result-link:hover {
    color: #34d399;
    text-decoration: underline;
}

.no-results {
    text-align: center;
    padding: 3rem 1rem;
    background: #1f2937;
    border: 1px solid #374151;
    border-radius: 8px;
}

.no-results-icon {
    font-size: 3rem;
    color: #10b981;
    margin-bottom: 1rem;
}

.no-results h3 {
    color: #10b981;
    margin: 0 0 1rem 0;
}

.no-results p {
    color: #9ca3af;
    margin: 0 0 2rem 0;
}

.no-results-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.button.primary {
    background: #10b981;
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: background-color 0.2s;
}

.button.primary:hover {
    background: #059669;
}

.button.secondary {
    background: #6b7280;
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: background-color 0.2s;
}

.button.secondary:hover {
    background: #4b5563;
}

@media (max-width: 768px) {
    .result-grid {
        grid-template-columns: 1fr;
    }

    .result-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.25rem;
    }

    .no-results-actions {
        flex-direction: column;
        align-items: center;
    }
}
</style>
@endsection
