<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    <style>
        body { font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif; padding: 1rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { border: 1px solid #ddd; padding: .5rem; text-align: left; }
        .actions { display: flex; gap: .5rem; }
        .badge { display: inline-block; padding: 0 .5rem; border: 1px solid #ccc; border-radius: .25rem; margin-right: .25rem; font-size: .85em; }
        .topbar { display:flex; justify-content: space-between; align-items:center; }
    </style>
  </head>
  <body>
    <div class="topbar">
        <h1>Stellenanzeigen</h1>
        <a href="{{ route('jobs.create') }}">Neue Anzeige</a>
    </div>

    @if(session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Titel</th>
                <th>Firma</th>
                <th>Ort</th>
                <th>Typ</th>
                <th>Kategorien</th>
                <th>Aktionen</th>
            </tr>
        </thead>
        <tbody>
        @forelse($jobs as $job)
            <tr>
                <td><a href="{{ route('jobs.show', $job) }}">{{ $job->title }}</a></td>
                <td>{{ optional($job->company)->name }}</td>
                <td>{{ $job->location }}</td>
                <td>{{ $job->type }}</td>
                <td>
                    @foreach($job->categories as $cat)
                        <span class="badge">{{ $cat->name }}</span>
                    @endforeach
                </td>
                <td class="actions">
                    <a href="{{ route('jobs.edit', $job) }}">Bearbeiten</a>
                    <form action="{{ route('jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Wirklich löschen?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Löschen</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">Keine Einträge</td></tr>
        @endforelse
        </tbody>
    </table>

    <div style="margin-top:1rem;">
        {{ $jobs->links() }}
    </div>
  </body>
  </html>


