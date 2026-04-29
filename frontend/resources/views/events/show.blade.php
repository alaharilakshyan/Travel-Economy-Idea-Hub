<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <div style="max-width: 800px; margin: 0 auto;">
            @include('partials.flash-messages')
            
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-8);">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--spacing-4);">
                        <span class="badge" style="background: var(--color-secondary); color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem;">
                            {{ $event->spot->name ?? 'Unknown Location' }}
                        </span>
                    </div>
                    
                    <h1 style="font-size: 2rem; margin-bottom: var(--spacing-4); color: var(--color-text-main);">{{ $event->title }}</h1>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--spacing-4); margin-bottom: var(--spacing-6); padding: var(--spacing-4); background: var(--color-background); border-radius: 8px;">
                        <div>
                            <span style="font-size: 0.75rem; color: var(--color-text-muted); text-transform: uppercase;">Date</span>
                            <p style="font-weight: 600;">{{ $event->event_date->format('F d, Y') }}</p>
                        </div>
                        @if($event->start_time)
                            <div>
                                <span style="font-size: 0.75rem; color: var(--color-text-muted); text-transform: uppercase;">Time</span>
                                <p style="font-weight: 600;">
                                    {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
                                    @if($event->end_time)
                                        - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                                    @endif
                                </p>
                            </div>
                        @endif
                        @if($event->spot)
                            <div>
                                <span style="font-size: 0.75rem; color: var(--color-text-muted); text-transform: uppercase;">Location</span>
                                <p style="font-weight: 600;">{{ $event->spot->name }}</p>
                            </div>
                        @endif
                    </div>
                    
                    <div style="line-height: 1.8; color: var(--color-text-main);">
                        {{ $event->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
