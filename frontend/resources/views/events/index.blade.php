<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <div style="text-align: center; margin-bottom: var(--spacing-8);">
            <h1 style="font-size: 2.5rem; color: var(--color-text-main); margin-bottom: var(--spacing-3);">Events</h1>
            <p style="font-size: 1.125rem; color: var(--color-text-muted); max-width: 600px; margin: 0 auto;">
                Discover exciting events happening at tourist spots across India
            </p>
        </div>
        
        @include('partials.flash-messages')
        
        @if($events->count() > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: var(--spacing-6);">
                @foreach($events as $event)
                    <div class="card" style="display: flex; flex-direction: column;">
                        <div class="card__content" style="flex: 1; padding: var(--spacing-6);">
                            <div style="margin-bottom: var(--spacing-4);">
                                <span class="badge" style="background: var(--color-secondary); color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem;">
                                    {{ $event->spot->name ?? 'Unknown Location' }}
                                </span>
                            </div>
                            
                            <h3 style="font-size: 1.25rem; margin-bottom: var(--spacing-3); color: var(--color-text-main);">
                                {{ $event->title }}
                            </h3>
                            
                            <p style="color: var(--color-text-muted); margin-bottom: var(--spacing-4); line-height: 1.6;">
                                {{ Str::limit($event->description, 120) }}
                            </p>
                            
                            <div style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: var(--spacing-4);">
                                <div style="margin-bottom: var(--spacing-1);">
                                    <strong>Date:</strong> {{ $event->event_date->format('F d, Y') }}
                                </div>
                                @if($event->start_time)
                                    <div>
                                        <strong>Time:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
                                        @if($event->end_time)
                                            - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                                        @endif
                                    </div>
                                @endif
                            </div>
                            
                            <a href="{{ route('events.show', $event) }}" class="btn btn-primary" style="display: block; text-align: center; margin-top: auto;">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div style="margin-top: var(--spacing-6);">
                {{ $events->links() }}
            </div>
        @else
            @include('partials.empty-state', [
                'icon' => '🎉',
                'title' => 'No Events Yet',
                'message' => 'Check back soon for upcoming events!',
                'actionLabel' => null,
                'actionRoute' => null
            ])
        @endif
    </div>
</x-app-layout>
