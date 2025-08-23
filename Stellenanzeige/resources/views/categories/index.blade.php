@extends('layouts.app')

@section('title','Kategorien')

@section('content')
    <div class="panel">
        <div class="page-header">
            <h1 style="margin:0; color: #10b981;">🏷️ Kategorien</h1>
            <a class="button primary" href="{{ route('categories.create') }}">
                <span style="margin-right: 0.5rem;">➕</span>Neue Kategorie
            </a>
        </div>

        @if(session('status'))
            <div class="status-message">
                <span style="margin-right: 0.5rem;">✅</span>{{ session('status') }}
            </div>
        @endif

        <div class="categories-table-container">
            <table class="categories-table">
                <thead>
                    <tr>
                        <th class="name-column">Name</th>
                        <th class="slug-column">Slug</th>
                        <th class="description-column">Beschreibung</th>
                        <th class="jobs-count-column">Stellen</th>
                        <th class="actions-column">Aktionen</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr class="category-row">
                        <td class="name-cell">
                            <a href="{{ route('categories.show', $category) }}" class="category-name-link">
                                {{ $category->name }}
                            </a>
                        </td>
                        <td class="slug-cell">
                            <span class="slug-text">{{ $category->slug }}</span>
                        </td>
                        <td class="description-cell">
                            <span class="description-text">{{ $category->description ?? 'Keine Beschreibung' }}</span>
                        </td>
                        <td class="jobs-count-cell">
                            <span class="jobs-count">{{ $category->jobListings->count() }}</span>
                        </td>
                        <td class="actions-cell">
                            <div class="action-buttons">
                                <a class="button secondary small" href="{{ route('categories.edit', $category) }}">
                                    <span style="margin-right: 0.5rem;">✏️</span>Bearbeiten
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST"
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
                        <td colspan="5" class="no-categories">
                            <div class="empty-state">
                                <span class="empty-icon">🏷️</span>
                                <h3>Keine Kategorien vorhanden</h3>
                                <p>Erstellen Sie die erste Kategorie, um zu beginnen.</p>
                                <a href="{{ route('categories.create') }}" class="button primary">Erste Kategorie erstellen</a>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        @if($categories->hasPages())
            <div class="pagination-container">
                {{ $categories->links() }}
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

.categories-table-container {
    background: #1f2937;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.3);
}

.categories-table {
    width: 100%;
    border-collapse: collapse;
}

.categories-table th {
    background: #374151;
    padding: 1.2rem 1rem;
    text-align: left;
    font-weight: 600;
    color: #10b981;
    border-bottom: 2px solid #10b981;
}

.categories-table td {
    padding: 1.2rem 1rem;
    border-bottom: 1px solid #4b5563;
    vertical-align: top;
    color: #e5e7eb;
}

.category-row:hover {
    background: #374151;
}

.name-column { width: 25%; }
.slug-column { width: 20%; }
.description-column { width: 35%; }
.jobs-count-column { width: 10%; }
.actions-column { width: 200px; }

.category-name-link {
    color: #10b981;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.1rem;
}

.category-name-link:hover {
    color: #34d399;
    text-decoration: underline;
}

.slug-text {
    background: #374151;
    color: #9ca3af;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-family: monospace;
    font-size: 0.875rem;
    border: 1px solid #4b5563;
}

.description-text {
    color: #e5e7eb;
    line-height: 1.5;
}

.jobs-count {
    background: #10b981;
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-weight: 600;
    font-size: 0.875rem;
    text-align: center;
    display: inline-block;
    min-width: 2rem;
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

.no-categories {
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


