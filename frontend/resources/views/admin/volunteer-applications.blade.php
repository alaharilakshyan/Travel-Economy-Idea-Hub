<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-6);">
            <h1 style="font-size: 2rem; color: var(--color-text-main);">Volunteer Applications</h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
        </div>
        
        @include('partials.flash-messages')
        
        <div class="card">
            <div class="card__content" style="padding: 0;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: var(--color-background); border-bottom: 1px solid var(--color-border);">
                            <th style="padding: var(--spacing-4); text-align: left;">Volunteer</th>
                            <th style="padding: var(--spacing-4); text-align: left;">Activity</th>
                            <th style="padding: var(--spacing-4); text-align: center;">Applied</th>
                            <th style="padding: var(--spacing-4); text-align: center;">Status</th>
                            <th style="padding: var(--spacing-4); text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                            <tr style="border-bottom: 1px solid var(--color-border);">
                                <td style="padding: var(--spacing-4);">
                                    <div style="display: flex; align-items: center; gap: var(--spacing-3);">
                                        <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--color-primary); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 0.875rem;">
                                            {{ substr($application->user->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div style="font-weight: 500;">{{ $application->user->name }}</div>
                                            <div style="font-size: 0.75rem; color: var(--color-text-muted);">{{ $application->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td style="padding: var(--spacing-4);">{{ $application->activity->title }}</td>
                                <td style="padding: var(--spacing-4); text-align: center;">{{ $application->created_at->format('M d, Y') }}</td>
                                <td style="padding: var(--spacing-4); text-align: center;">
                                    <span class="badge" style="background: {{ $application->status === 'approved' ? 'var(--color-success)' : ($application->status === 'rejected' ? 'var(--color-error)' : 'var(--color-warning)') }}; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; text-transform: capitalize;">
                                        {{ $application->status }}
                                    </span>
                                </td>
                                <td style="padding: var(--spacing-4); text-align: center;">
                                    @if($application->status === 'pending')
                                        <form action="{{ route('admin.volunteer.applications.approve', $application) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                        </form>
                                        <form action="{{ route('admin.volunteer.applications.reject', $application) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                        </form>
                                    @else
                                        <span style="color: var(--color-text-muted);">Processed</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div style="margin-top: var(--spacing-6);">
            {{ $applications->links() }}
        </div>
    </div>
</x-app-layout>
