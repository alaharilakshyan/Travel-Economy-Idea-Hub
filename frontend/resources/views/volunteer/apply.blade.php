<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <div style="max-width: 600px; margin: 0 auto;">
            <h1 style="font-size: 2rem; margin-bottom: var(--spacing-2); color: var(--color-text-main);">Volunteer Registration</h1>
            <p style="color: var(--color-text-muted); margin-bottom: var(--spacing-6);">{{ $activity->title }}</p>
            
            @include('partials.flash-messages')
            
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-6);">
                    <div style="background: var(--color-background); padding: var(--spacing-4); border-radius: 8px; margin-bottom: var(--spacing-6);">
                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--spacing-4);">
                            <div>
                                <span style="font-size: 0.75rem; color: var(--color-text-muted); text-transform: uppercase;">Date</span>
                                <p style="font-weight: 600;">{{ $activity->start_date->format('F d, Y') }}</p>
                            </div>
                            <div>
                                <span style="font-size: 0.75rem; color: var(--color-text-muted); text-transform: uppercase;">Location</span>
                                <p style="font-weight: 600;">{{ $activity->location }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <form action="{{ route('volunteer.apply.store', $activity) }}" method="POST">
                        @csrf
                        
                        <div style="margin-bottom: var(--spacing-4);">
                            <label for="message" style="display: block; margin-bottom: var(--spacing-2); font-weight: 500;">Why do you want to volunteer? (Optional)</label>
                            <textarea name="message" id="message" rows="4" class="form-input" placeholder="Tell us why you're interested in this volunteer opportunity..." style="width: 100%; padding: var(--spacing-3); border: 1px solid var(--color-border); border-radius: 8px; resize: vertical;">{{ old('message') }}</textarea>
                            @error('message')
                                <span style="color: var(--color-error); font-size: 0.875rem;">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div style="display: flex; gap: var(--spacing-3);">
                            <button type="submit" class="btn btn-primary">Confirm Registration</button>
                            <a href="{{ route('volunteer.show', $activity) }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
