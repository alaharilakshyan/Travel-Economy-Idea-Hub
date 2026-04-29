<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-6);">
            <div>
                <h1 style="font-size: 2rem; color: var(--color-text-main); margin-bottom: var(--spacing-2);">Community Idea Hub</h1>
                <p style="color: var(--color-text-muted);">Discover and share travel ideas from the community</p>
            </div>
        </div>

        @include('partials.flash-messages')

        <!-- Submit Idea CTA -->
        <div style="display: flex; justify-content: flex-end; margin-bottom: var(--spacing-6);">
            @auth
                <a href="{{ route('ideas.create') }}" class="btn btn-primary" style="display: flex; align-items: center; gap: var(--spacing-2);">
                    <span>💡</span> Submit Your Idea
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary" style="display: flex; align-items: center; gap: var(--spacing-2);">
                    <span>💡</span> Sign In to Submit Idea
                </a>
            @endauth
        </div>

        @if($ideas->count() > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: var(--spacing-6);">
                @foreach($ideas as $idea)
                    <div class="card" style="display: flex; flex-direction: column;">
                        <div class="card__content" style="flex: 1; padding: var(--spacing-6);">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--spacing-4);">
                                <span class="badge" style="background: var(--color-primary); color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem;">
                                    {{ $idea->category }}
                                </span>
                                <span class="badge" style="background: {{ $idea->status === 'approved' ? 'var(--color-success)' : ($idea->status === 'rejected' ? 'var(--color-error)' : 'var(--color-warning)') }}; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; text-transform: capitalize;">
                                    {{ $idea->status }}
                                </span>
                            </div>
                            
                            <h3 style="font-size: 1.25rem; margin-bottom: var(--spacing-3);">
                                <a href="{{ route('ideas.show', $idea) }}" style="color: var(--color-text-main); text-decoration: none;">
                                    {{ $idea->title }}
                                </a>
                            </h3>
                            
                            <p style="color: var(--color-text-muted); margin-bottom: var(--spacing-4); line-height: 1.6;">
                                {{ Str::limit($idea->description, 150) }}
                            </p>
                            
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto; padding-top: var(--spacing-4); border-top: 1px solid var(--color-border);">
                                <div style="display: flex; align-items: center; gap: var(--spacing-2);">
                                    <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--color-primary); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                        {{ substr($idea->user->name, 0, 1) }}
                                    </div>
                                    <span style="font-size: 0.875rem; color: var(--color-text-muted);">{{ $idea->user->name }}</span>
                                </div>
                                
                                <div style="display: flex; gap: var(--spacing-4); font-size: 0.875rem; color: var(--color-text-muted);">
                                    <span>{{ $idea->votes->count() }} votes</span>
                                    <span>{{ $idea->comments->count() }} comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div style="margin-top: var(--spacing-6);">
                {{ $ideas->links() }}
            </div>
        @else
            <div class="card" style="text-align: center; padding: var(--spacing-12);">
                <div style="font-size: 3rem; margin-bottom: var(--spacing-4);">💡</div>
                <h3 style="margin-bottom: var(--spacing-3);">No Ideas Yet</h3>
                <p style="color: var(--color-text-muted);">Be the first to share your travel idea with the community!</p>
                @auth
                    <a href="{{ route('ideas.create') }}" class="btn btn-primary" style="margin-top: var(--spacing-4);">Submit Your Idea</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary" style="margin-top: var(--spacing-4);">Sign In to Submit</a>
                @endauth
            </div>
        @endif
    </div>
</x-app-layout>
