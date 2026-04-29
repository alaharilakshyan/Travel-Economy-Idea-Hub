<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <div style="text-align: center; margin-bottom: var(--spacing-8);">
            <h1 style="font-size: 2.5rem; color: var(--color-text-main); margin-bottom: var(--spacing-3);">Volunteer & Give Back</h1>
            <p style="font-size: 1.125rem; color: var(--color-text-muted); max-width: 600px; margin: 0 auto;">
                Join activities at India's most treasured spots and make a difference
            </p>
        </div>
        
        @include('partials.flash-messages')
        
        @if($activities->count() > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: var(--spacing-6);">
                @foreach($activities as $activity)
                    <div class="card" style="display: flex; flex-direction: column;">
                        <div class="card__content" style="flex: 1; padding: var(--spacing-6);">
                            <div style="margin-bottom: var(--spacing-4);">
                                <span class="badge" style="background: var(--color-secondary); color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem;">
                                    {{ $activity->location }}
                                </span>
                            </div>
                            
                            <h3 style="font-size: 1.25rem; margin-bottom: var(--spacing-3); color: var(--color-text-main);">
                                {{ $activity->title }}
                            </h3>
                            
                            <p style="color: var(--color-text-muted); margin-bottom: var(--spacing-4); line-height: 1.6;">
                                {{ Str::limit($activity->description, 120) }}
                            </p>
                            
                            <div style="margin-bottom: var(--spacing-4);">
                                <div style="display: flex; justify-content: space-between; margin-bottom: var(--spacing-2);">
                                    <span style="font-size: 0.875rem; color: var(--color-text-muted);">
                                        {{ $activity->applications->count() }} / {{ $activity->max_volunteers }} registered
                                    </span>
                                    <span style="font-size: 0.875rem; color: var(--color-text-muted);">
                                        {{ round(($activity->applications->count() / $activity->max_volunteers) * 100) }}%
                                    </span>
                                </div>
                                <div style="height: 6px; background: var(--color-border); border-radius: 3px; overflow: hidden;">
                                    <div style="height: 100%; width: {{ min(100, ($activity->applications->count() / $activity->max_volunteers) * 100) }}%; background: {{ $activity->applications->count() >= $activity->max_volunteers ? 'var(--color-error)' : 'var(--color-success)' }}; border-radius: 3px;"></div>
                                </div>
                            </div>
                            
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto; padding-top: var(--spacing-4); border-top: 1px solid var(--color-border);">
                                <div style="font-size: 0.875rem; color: var(--color-text-muted);">
                                    <div>{{ $activity->start_date->format('M d, Y') }}</div>
                                    <div>{{ $activity->start_date->format('h:i A') }} - {{ $activity->end_date->format('h:i A') }}</div>
                                </div>
                                
                                <a href="{{ route('volunteer.show', $activity) }}" class="btn btn-primary">
                                    {{ $activity->applications->count() >= $activity->max_volunteers ? 'Full' : 'View Details' }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div style="margin-top: var(--spacing-6);">
                {{ $activities->links() }}
            </div>
        @else
            @include('partials.empty-state', [
                'icon' => '🤝',
                'title' => 'No Volunteer Activities',
                'message' => 'Check back soon for upcoming volunteer opportunities!',
                'actionLabel' => null,
                'actionRoute' => null
            ])
        @endif
    </div>
</x-app-layout>
