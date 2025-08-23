@extends('layouts.app')

@section('title','Stellenanzeigen')

@section('content')
    <div class="panel">
        <div class="page-header">
            <h1 style="margin:0; color: #10b981;">💼 Stellenanzeigen</h1>
            <a class="button primary" href="{{ route('jobs.create') }}">
                <span style="margin-right: 0.5rem;">➕</span>Neue Stelle
            </a>
        </div>

        @if(session('status'))
            <div class="status-message">
                <span style="margin-right: 0.5rem;">✅</span>{{ session('status') }}
            </div>
        @endif

        <div class="jobs-table-container">
            <table class="jobs-table">
                <thead>
                    <tr>
                        <th class="title-column">Titel</th>
                        <th class="company-column">Firma</th>
                        <th class="category-column">Kategorien</th>
                        <th class="location-column">Standort</th>
                        <th class="type-column">Typ</th>
                        <th class="actions-column">Aktionen</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($jobs as $job)
                    <tr class="job-row">
                        <td class="title-cell">
                            <a href="{{ route('jobs.show', $job) }}" class="job-title-link">
                                {{ $job->title }}
                            </a>
                        </td>
                        <td class="company-cell">
                            @if($job->company)
                                <a href="{{ route('companies.show', $job->company) }}" class="company-link">
                                    {{ $job->company->name }}
                                </a>
                            @else
                                <span class="no-company">Keine Firma</span>
                            @endif
                        </td>
                        <td class="category-cell">
                            @if($job->categories->count() > 0)
                                <div class="categories-list">
                                    @foreach($job->categories->take(2) as $category)
                                        <a href="{{ route('categories.show', $category) }}" class="category-link">
                                            {{ $category->name }}
                                        </a>
                                        @if(!$loop->last), @endif
                                    @endforeach
                                    @if($job->categories->count() > 2)
                                        <span class="more-categories">+{{ $job->categories->count() - 2 }} weitere</span>
                                    @endif
                                </div>
                            @else
                                <span class="no-category">Keine Kategorien</span>
                            @endif
                        </td>
                        <td class="location-cell">
                            <span class="location-text">{{ $job->location }}</span>
                        </td>
                        <td class="type-cell">
                            <span class="job-type">{{ $job->type }}</span>
                        </td>
                        <td class="actions-cell">
                            <div class="action-buttons">
                                <a class="button secondary small" href="{{ route('jobs.edit', $job) }}">
                                    <span style="margin-right: 0.5rem;">✏️</span>Bearbeiten
                                </a>
                                <form action="{{ route('jobs.destroy', $job) }}" method="POST"
                                      onsubmit="return confirm('Wirklich löschen?')" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button danger small" type="submit">
                                        <span style="margin-right: 0.5rem;">🗑️</span>Löschen
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="no-jobs">
                            <div class="empty-state">
                                <span class="empty-icon">💼</span>
                                <h3>Keine Stellenanzeigen vorhanden</h3>
                                <p>Erstellen Sie die erste Stellenanzeige, um zu beginnen.</p>
                                <a href="{{ route('jobs.create') }}" class="button primary">Erste Stelle erstellen</a>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        @if($jobs->hasPages())
            <div class="pagination-container">
                {{ $jobs->links() }}
            </div>
        @endif
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

.status-message {
    background: #d1fae5;
    color: #065f46;
    padding: 1rem;
    border-radius: 6px;
    margin-bottom: 1.5rem;
    border-left: 4px solid #10b981;
    font-weight: 500;
}

.jobs-table-container {
    background: #1f2937;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.3);
}

.jobs-table {
    width: 100%;
    border-collapse: collapse;
}

.jobs-table th {
    background: #374151;
    padding: 1.2rem 1rem;
    text-align: left;
    font-weight: 600;
    color: #10b981;
    border-bottom: 2px solid #10b981;
}

.jobs-table td {
    padding: 1.2rem 1rem;
    border-bottom: 1px solid #4b5563;
    vertical-align: top;
    color: #e5e7eb;
}

.job-row:hover {
    background: #374151;
}

.title-column { width: 25%; }
.company-column { width: 20%; }
.category-column { width: 20%; }
.location-column { width: 15%; }
.type-column { width: 15%; }
.actions-column { width: 200px; }

.job-title-link {
    color: #10b981;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.1rem;
}

.job-title-link:hover {
    color: #34d399;
    text-decoration: underline;
}

.company-link {
    color: #10b981;
    text-decoration: none;
}

.company-link:hover {
    color: #34d399;
    text-decoration: underline;
}

.categories-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.25rem;
    align-items: center;
}

.category-link {
    color: #10b981;
    text-decoration: none;
    font-size: 0.875rem;
}

.category-link:hover {
    color: #34d399;
    text-decoration: underline;
}

.more-categories {
    color: #9ca3af;
    font-size: 0.75rem;
    font-style: italic;
}

.no-company, .no-category {
    color: #9ca3af;
    font-style: italic;
}

.location-text {
    color: #e5e7eb;
}

.job-type {
    background: #374151;
    color: #10b981;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-size: 0.875rem;
    border: 1px solid #10b981;
}

.action-buttons {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.button.small {
    padding: 0.5rem 0.75rem;
    font-size: 0.875rem;
}

.delete-form {
    margin: 0;
}

.no-jobs {
    text-align: center;
    padding: 3rem 1rem;
}

.empty-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
}

.empty-icon {
    font-size: 3rem;
    color: #10b981;
}

.empty-state h3 {
    color: #10b981;
    margin: 0;
}

.empty-state p {
    color: #9ca3af;
    margin: 0;
}

.pagination-container {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
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

.button.danger {
    background: #ef4444;
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.2s;
}

.button.danger:hover {
    background: #dc2626;
}
</style>
@endsection


