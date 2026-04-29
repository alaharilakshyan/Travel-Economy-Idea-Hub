<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <div style="max-width: 800px; margin: 0 auto;">
            @include('partials.flash-messages')
            
            <div class="card" style="margin-bottom: var(--spacing-6);">
                <div class="card__content" style="padding: var(--spacing-8);">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--spacing-4);">
                        <span class="badge" style="background: var(--color-secondary); color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem;">
                            {{ $activity->location }}
                        </span>
                        @if($hasApplied)
                            <span class="badge" style="background: var(--color-success); color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem;">
                                Registered
                            </span>
                        @endif
                    </div>
                    
                    <h1 style="font-size: 2rem; margin-bottom: var(--spacing-4); color: var(--color-text-main);">{{ $activity->title }}</h1>
                    
                    <div style="margin-bottom: var(--spacing-6);">
                        <div style="display: flex; justify-content: space-between; margin-bottom: var(--spacing-2);">
                            <span style="font-size: 0.875rem; color: var(--color-text-muted);">
                                {{ $activity->applications->count() }} / {{ $activity->max_volunteers }} volunteers registered
                            </span>
                            <span style="font-size: 0.875rem; color: var(--color-text-muted);">
                                {{ round(($activity->applications->count() / $activity->max_volunteers) * 100) }}% full
                            </span>
                        </div>
                        <div style="height: 8px; background: var(--color-border); border-radius: 4px; overflow: hidden;">
                            <div style="height: 100%; width: {{ min(100, ($activity->applications->count() / $activity->max_volunteers) * 100) }}%; background: {{ $activity->applications->count() >= $activity->max_volunteers ? 'var(--color-error)' : 'var(--color-success)' }}; border-radius: 4px;"></div>
                        </div>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--spacing-4); margin-bottom: var(--spacing-6); padding: var(--spacing-4); background: var(--color-background); border-radius: 8px;">
                        <div>
                            <span style="font-size: 0.75rem; color: var(--color-text-muted); text-transform: uppercase;">Date</span>
                            <p style="font-weight: 600;">{{ $activity->start_date->format('F d, Y') }}</p>
                        </div>
                        <div>
                            <span style="font-size: 0.75rem; color: var(--color-text-muted); text-transform: uppercase;">Time</span>
                            <p style="font-weight: 600;">{{ $activity->start_date->format('h:i A') }} - {{ $activity->end_date->format('h:i A') }}</p>
                        </div>
                        <div>
                            <span style="font-size: 0.75rem; color: var(--color-text-muted); text-transform: uppercase;">Location</span>
                            <p style="font-weight: 600;">{{ $activity->location }}</p>
                        </div>
                    </div>
                    
                    <div style="line-height: 1.8; color: var(--color-text-main); margin-bottom: var(--spacing-6);">
                        {{ $activity->description }}
                    </div>
                    
                    @auth
                        @if(!$hasApplied && $activity->applications->count() < $activity->max_volunteers)
                            <a href="{{ route('volunteer.apply', $activity) }}" class="btn btn-primary" style="display: inline-block;">Register as Volunteer</a>
                        @elseif($hasApplied)
                            <button class="btn btn-secondary" disabled>You are registered</button>
                        @else
                            <button class="btn btn-secondary" disabled>Registration Full</button>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Login to Register</a>
                    @endauth
                </div>
            </div>
            
            @if(auth()->check() && auth()->user()->is_admin)
                <div class="card">
                    <div class="card__content" style="padding: var(--spacing-6);">
                        <h3 style="font-size: 1.5rem; margin-bottom: var(--spacing-4);">Registered Volunteers ({{ $activity->applications->count() }})</h3>
                        
                        @if($activity->applications->count() > 0)
                            <div style="display: flex; flex-direction: column; gap: var(--spacing-3);">
                                @foreach($activity->applications as $application)
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding: var(--spacing-3); background: var(--color-background); border-radius: 8px;">
                                        <div style="display: flex; align-items: center; gap: var(--spacing-3);">
                                            <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--color-primary); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                                {{ substr($application->user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div style="font-weight: 600;">{{ $application->user->name }}</div>
                                                <div style="font-size: 0.875rem; color: var(--color-text-muted);">{{ $application->user->email }}</div>
                                            </div>
                                        </div>
                                        <span class="badge" style="background: {{ $application->status === 'approved' ? 'var(--color-success)' : ($application->status === 'rejected' ? 'var(--color-error)' : 'var(--color-warning)') }}; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; text-transform: capitalize;">
                                            {{ $application->status }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p style="color: var(--color-text-muted); text-align: center; padding: var(--spacing-4);">No volunteers registered yet.</p>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
