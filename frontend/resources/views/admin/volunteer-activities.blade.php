<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-6);">
            <h1 style="font-size: 2rem; color: var(--color-text-main);">Volunteer Activities</h1>
            <div style="display: flex; gap: var(--spacing-3);">
                <a href="{{ route('admin.volunteer.activities.create') }}" class="btn btn-primary">Create Activity</a>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        
        @include('partials.flash-messages')
        
        <div class="card">
            <div class="card__content" style="padding: 0;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: var(--color-background); border-bottom: 1px solid var(--color-border);">
                            <th style="padding: var(--spacing-4); text-align: left;">Title</th>
                            <th style="padding: var(--spacing-4); text-align: center;">Location</th>
                            <th style="padding: var(--spacing-4); text-align: center;">Date</th>
                            <th style="padding: var(--spacing-4); text-align: center;">Volunteers</th>
                            <th style="padding: var(--spacing-4); text-align: center;">Status</th>
                            <th style="padding: var(--spacing-4); text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activities as $activity)
                            <tr style="border-bottom: 1px solid var(--color-border);">
                                <td style="padding: var(--spacing-4);">{{ $activity->title }}</td>
                                <td style="padding: var(--spacing-4); text-align: center;">{{ $activity->location }}</td>
                                <td style="padding: var(--spacing-4); text-align: center;">{{ $activity->start_date->format('M d, Y') }}</td>
                                <td style="padding: var(--spacing-4); text-align: center;">{{ $activity->applications->count() }} / {{ $activity->max_volunteers }}</td>
                                <td style="padding: var(--spacing-4); text-align: center;">
                                    <span class="badge" style="background: {{ $activity->status === 'active' ? 'var(--color-success)' : ($activity->status === 'cancelled' ? 'var(--color-error)' : 'var(--color-warning)') }}; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; text-transform: capitalize;">
                                        {{ $activity->status }}
                                    </span>
                                </td>
                                <td style="padding: var(--spacing-4); text-align: center;">
                                    <a href="{{ route('admin.volunteer.activities.show', $activity) }}" class="btn btn-sm btn-secondary">View</a>
                                    <a href="{{ route('admin.volunteer.activities.edit', $activity) }}" class="btn btn-sm btn-secondary">Edit</a>
                                    <form action="{{ route('admin.volunteer.activities.destroy', $activity) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div style="margin-top: var(--spacing-6);">
            {{ $activities->links() }}
        </div>
    </div>
</x-app-layout>
