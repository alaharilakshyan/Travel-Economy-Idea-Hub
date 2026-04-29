<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-6);">
            <h1 style="font-size: 2rem; color: var(--color-text-main);">Reports & Analytics</h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
        </div>
        
        @include('partials.flash-messages')
        
        <!-- Stats Overview -->
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: var(--spacing-6); margin-bottom: var(--spacing-8);">
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-4);">
                    <div style="font-size: 0.875rem; color: var(--color-text-muted);">Total Users</div>
                    <div style="font-size: 1.75rem; font-weight: bold; color: var(--color-primary);">{{ $totalUsers }}</div>
                    <div style="font-size: 0.75rem; color: var(--color-text-muted);">+{{ $usersThisMonth }} this month</div>
                </div>
            </div>
            
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-4);">
                    <div style="font-size: 0.875rem; color: var(--color-text-muted);">Total Ideas</div>
                    <div style="font-size: 1.75rem; font-weight: bold; color: var(--color-secondary);">{{ $totalIdeas }}</div>
                    <div style="font-size: 0.75rem; color: var(--color-text-muted);">+{{ $ideasThisMonth }} this month</div>
                </div>
            </div>
            
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-4);">
                    <div style="font-size: 0.875rem; color: var(--color-text-muted);">Total Votes</div>
                    <div style="font-size: 1.75rem; font-weight: bold; color: var(--color-success);">{{ $totalVotes }}</div>
                </div>
            </div>
            
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-4);">
                    <div style="font-size: 0.875rem; color: var(--color-text-muted);">Total Comments</div>
                    <div style="font-size: 1.75rem; font-weight: bold; color: var(--color-warning);">{{ $totalComments }}</div>
                </div>
            </div>
            
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-4);">
                    <div style="font-size: 0.875rem; color: var(--color-text-muted);">Activities</div>
                    <div style="font-size: 1.75rem; font-weight: bold; color: var(--color-primary);">{{ $totalActivities }}</div>
                </div>
            </div>
            
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-4);">
                    <div style="font-size: 0.875rem; color: var(--color-text-muted);">Applications</div>
                    <div style="font-size: 1.75rem; font-weight: bold; color: var(--color-secondary);">{{ $totalApplications }}</div>
                </div>
            </div>
        </div>
        
        <!-- Recent Activity -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-6);">
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-6);">
                    <h3 style="font-size: 1.25rem; margin-bottom: var(--spacing-4);">Recent Ideas</h3>
                    @if($recentIdeas->count() > 0)
                        <div style="display: flex; flex-direction: column; gap: var(--spacing-3);">
                            @foreach($recentIdeas as $idea)
                                <div style="display: flex; justify-content: space-between; align-items: center; padding: var(--spacing-3); background: var(--color-background); border-radius: 8px;">
                                    <div>
                                        <div style="font-weight: 500;">{{ Str::limit($idea->title, 30) }}</div>
                                        <div style="font-size: 0.75rem; color: var(--color-text-muted);">by {{ $idea->user->name }}</div>
                                    </div>
                                    <span style="font-size: 0.75rem; color: var(--color-text-muted);">{{ $idea->created_at->diffForHumans() }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p style="color: var(--color-text-muted);">No recent ideas.</p>
                    @endif
                </div>
            </div>
            
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-6);">
                    <h3 style="font-size: 1.25rem; margin-bottom: var(--spacing-4);">Recent Applications</h3>
                    @if($recentApplications->count() > 0)
                        <div style="display: flex; flex-direction: column; gap: var(--spacing-3);">
                            @foreach($recentApplications as $application)
                                <div style="display: flex; justify-content: space-between; align-items: center; padding: var(--spacing-3); background: var(--color-background); border-radius: 8px;">
                                    <div>
                                        <div style="font-weight: 500;">{{ $application->user->name }}</div>
                                        <div style="font-size: 0.75rem; color: var(--color-text-muted);">{{ Str::limit($application->activity->title, 25) }}</div>
                                    </div>
                                    <span class="badge" style="background: {{ $application->status === 'approved' ? 'var(--color-success)' : ($application->status === 'rejected' ? 'var(--color-error)' : 'var(--color-warning)') }}; color: white; padding: 2px 8px; border-radius: 12px; font-size: 0.625rem; text-transform: capitalize;">
                                        {{ $application->status }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p style="color: var(--color-text-muted);">No recent applications.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
