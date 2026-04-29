<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <h1 style="font-size: 2rem; margin-bottom: var(--spacing-6); color: var(--color-text-main);">Admin Dashboard</h1>
        
        @include('partials.flash-messages')
        
        <!-- Pending Alerts -->
        @if($stats['pending_ideas'] > 0 || $stats['pending_applications'] > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--spacing-4); margin-bottom: var(--spacing-6);">
                @if($stats['pending_ideas'] > 0)
                    <div style="background: #fff3cd; border: 1px solid #ffc107; border-radius: 8px; padding: var(--spacing-4); display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <div style="font-weight: 600; color: #856404;">⚠️ Ideas Pending Review</div>
                            <div style="font-size: 0.875rem; color: #856404;">{{ $stats['pending_ideas'] }} idea(s) need your approval</div>
                        </div>
                        <a href="{{ route('admin.ideas') }}" style="background: #ffc107; color: #856404; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500;">Review Now</a>
                    </div>
                @endif
                @if($stats['pending_applications'] > 0)
                    <div style="background: #fff3cd; border: 1px solid #ffc107; border-radius: 8px; padding: var(--spacing-4); display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <div style="font-weight: 600; color: #856404;">⚠️ Applications Pending</div>
                            <div style="font-size: 0.875rem; color: #856404;">{{ $stats['pending_applications'] }} application(s) need review</div>
                        </div>
                        <a href="{{ route('admin.volunteer.applications') }}" style="background: #ffc107; color: #856404; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500;">Review Now</a>
                    </div>
                @endif
            </div>
        @endif

        <!-- Stats Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: var(--spacing-6); margin-bottom: var(--spacing-8);">
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-6);">
                    <div style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: var(--spacing-2);">Total Users</div>
                    <div style="font-size: 2.5rem; font-weight: bold; color: var(--color-primary);">{{ $stats['total_users'] }}</div>
                </div>
            </div>
            
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-6);">
                    <div style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: var(--spacing-2);">Total Ideas</div>
                    <div style="font-size: 2.5rem; font-weight: bold; color: var(--color-secondary);">{{ $stats['total_ideas'] }}</div>
                    @if($stats['pending_ideas'] > 0)
                        <div style="font-size: 0.75rem; color: var(--color-warning); margin-top: var(--spacing-1);">{{ $stats['pending_ideas'] }} pending</div>
                    @endif
                </div>
            </div>
            
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-6);">
                    <div style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: var(--spacing-2);">Volunteer Activities</div>
                    <div style="font-size: 2.5rem; font-weight: bold; color: var(--color-success);">{{ $stats['total_volunteer_activities'] }}</div>
                </div>
            </div>
            
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-6);">
                    <div style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: var(--spacing-2);">Volunteer Applications</div>
                    <div style="font-size: 2.5rem; font-weight: bold; color: var(--color-warning);">{{ $stats['total_volunteer_applications'] }}</div>
                    @if($stats['pending_applications'] > 0)
                        <div style="font-size: 0.75rem; color: var(--color-warning); margin-top: var(--spacing-1);">{{ $stats['pending_applications'] }} pending</div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="card" style="margin-bottom: var(--spacing-8);">
            <div class="card__content" style="padding: var(--spacing-6);">
                <h3 style="font-size: 1.25rem; margin-bottom: var(--spacing-4);">Quick Actions</h3>
                <div style="display: flex; flex-wrap: wrap; gap: var(--spacing-3);">
                    <a href="{{ route('admin.ideas') }}" class="btn btn-primary">Manage Ideas</a>
                    <a href="{{ route('admin.volunteer.activities') }}" class="btn btn-primary">Manage Activities</a>
                    <a href="{{ route('admin.volunteer.applications') }}" class="btn btn-primary">Review Applications</a>
                    <a href="{{ route('admin.reports') }}" class="btn btn-secondary">View Reports</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
