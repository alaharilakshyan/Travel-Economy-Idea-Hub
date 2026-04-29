<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <div style="max-width: 800px; margin: 0 auto;">
            @include('partials.flash-messages')
            
            <div class="card" style="margin-bottom: var(--spacing-6);">
                <div class="card__content" style="padding: var(--spacing-8);">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--spacing-4);">
                        <div>
                            <span class="badge" style="background: var(--color-primary); color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; margin-right: var(--spacing-2);">
                                {{ $idea->category }}
                            </span>
                            <span class="badge" style="background: {{ $idea->status === 'approved' ? 'var(--color-success)' : ($idea->status === 'rejected' ? 'var(--color-error)' : 'var(--color-warning)') }}; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; text-transform: capitalize;">
                                {{ $idea->status }}
                            </span>
                        </div>
                        <span style="color: var(--color-text-muted); font-size: 0.875rem;">{{ $idea->created_at->diffForHumans() }}</span>
                    </div>
                    
                    <h1 style="font-size: 2rem; margin-bottom: var(--spacing-4); color: var(--color-text-main);">{{ $idea->title }}</h1>
                    
                    <div style="display: flex; align-items: center; gap: var(--spacing-3); margin-bottom: var(--spacing-6);">
                        <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--color-primary); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                            {{ substr($idea->user->name, 0, 1) }}
                        </div>
                        <div>
                            <div style="font-weight: 600;">{{ $idea->user->name }}</div>
                            <div style="font-size: 0.875rem; color: var(--color-text-muted);">{{ $idea->user->email }}</div>
                        </div>
                    </div>
                    
                    <div style="line-height: 1.8; color: var(--color-text-main); margin-bottom: var(--spacing-6);">
                        {{ $idea->description }}
                    </div>
                    
                    <!-- Attached Media -->
                    @if(!empty($idea->media))
                        <div style="margin-bottom: var(--spacing-6);">
                            <h4 style="font-size: 1rem; margin-bottom: var(--spacing-3); color: var(--color-text-muted);">📎 Attached Media</h4>
                            <div style="display: flex; flex-wrap: wrap; gap: var(--spacing-3);">
                                @foreach($idea->media as $media)
                                    <div style="position: relative;">
                                        @if(str_starts_with($media['type'], 'image/'))
                                            <a href="{{ asset('storage/' . $media['path']) }}" target="_blank" style="display: block;">
                                                <img src="{{ asset('storage/' . $media['path']) }}" alt="{{ $media['name'] }}" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px; border: 1px solid var(--color-border);">
                                            </a>
                                        @elseif(str_starts_with($media['type'], 'video/'))
                                            <a href="{{ asset('storage/' . $media['path']) }}" target="_blank" style="display: flex; align-items: center; gap: var(--spacing-2); padding: var(--spacing-3); background: var(--color-background); border-radius: 8px; text-decoration: none; color: var(--color-text-main);">
                                                <span style="font-size: 1.5rem;">🎥</span>
                                                <div>
                                                    <div style="font-size: 0.875rem; font-weight: 500;">{{ $media['name'] }}</div>
                                                    <div style="font-size: 0.75rem; color: var(--color-text-muted);">Video</div>
                                                </div>
                                            </a>
                                        @else
                                            <a href="{{ asset('storage/' . $media['path']) }}" target="_blank" style="display: flex; align-items: center; gap: var(--spacing-2); padding: var(--spacing-3); background: var(--color-background); border-radius: 8px; text-decoration: none; color: var(--color-text-main);">
                                                <span style="font-size: 1.5rem;">📄</span>
                                                <div>
                                                    <div style="font-size: 0.875rem; font-weight: 500;">{{ $media['name'] }}</div>
                                                    <div style="font-size: 0.75rem; color: var(--color-text-muted);">Document</div>
                                                </div>
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    @auth
                        <div style="display: flex; gap: var(--spacing-4); padding-top: var(--spacing-4); border-top: 1px solid var(--color-border);">
                            <form action="{{ route('ideas.vote', $idea) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn {{ $idea->votes->where('user_id', auth()->id())->count() > 0 ? 'btn-primary' : 'btn-secondary' }}" style="display: flex; align-items: center; gap: var(--spacing-2);">
                                    <span>👍</span>
                                    <span>{{ $idea->votes->where('user_id', auth()->id())->count() > 0 ? 'Voted' : 'Vote' }} ({{ $idea->votes->count() }})</span>
                                </button>
                            </form>
                        </div>
                    @endauth
                    
                    <!-- Social Sharing -->
                    <div style="display: flex; gap: var(--spacing-3); padding-top: var(--spacing-4); margin-top: var(--spacing-4); border-top: 1px solid var(--color-border);">
                        <span style="font-size: 0.875rem; color: var(--color-text-muted); align-self: center;">Share:</span>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($idea->title) }}&url={{ urlencode(route('ideas.show', $idea)) }}" target="_blank" style="width: 36px; height: 36px; border-radius: 50%; background: #1DA1F2; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; font-size: 0.875rem;">𝕏</a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('ideas.show', $idea)) }}" target="_blank" style="width: 36px; height: 36px; border-radius: 50%; background: #4267B2; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; font-size: 0.875rem;">f</a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('ideas.show', $idea)) }}&title={{ urlencode($idea->title) }}" target="_blank" style="width: 36px; height: 36px; border-radius: 50%; background: #0077b5; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; font-size: 0.875rem;">in</a>
                        <a href="https://wa.me/?text={{ urlencode($idea->title . ' ' . route('ideas.show', $idea)) }}" target="_blank" style="width: 36px; height: 36px; border-radius: 50%; background: #25D366; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; font-size: 0.875rem;">📱</a>
                    </div>
                </div>
            </div>
            
            <!-- Comments Section -->
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-6);">
                    <h3 style="font-size: 1.5rem; margin-bottom: var(--spacing-4);">Comments ({{ $idea->comments->count() }})</h3>
                    
                    @auth
                        <form action="{{ route('ideas.comment', $idea) }}" method="POST" style="margin-bottom: var(--spacing-6);">
                            @csrf
                            <div style="margin-bottom: var(--spacing-3);">
                                <textarea name="content" rows="3" class="form-input" placeholder="Add a comment..." required style="width: 100%; padding: var(--spacing-3); border: 1px solid var(--color-border); border-radius: 8px; resize: vertical;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </form>
                    @endauth
                    
                    @if($idea->comments->count() > 0)
                        <div style="display: flex; flex-direction: column; gap: var(--spacing-4);">
                            @foreach($idea->comments as $comment)
                                <div style="padding: var(--spacing-4); background: var(--color-background); border-radius: 8px;">
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-2);">
                                        <div style="display: flex; align-items: center; gap: var(--spacing-2);">
                                            <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--color-secondary); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 0.875rem;">
                                                {{ substr($comment->user->name, 0, 1) }}
                                            </div>
                                            <span style="font-weight: 600;">{{ $comment->user->name }}</span>
                                        </div>
                                        <span style="font-size: 0.75rem; color: var(--color-text-muted);">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p style="color: var(--color-text-main); margin-left: 40px;">{{ $comment->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p style="color: var(--color-text-muted); text-align: center; padding: var(--spacing-4);">No comments yet. Be the first to comment!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
