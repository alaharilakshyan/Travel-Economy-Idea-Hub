<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-6);">
            <div>
                <h1 style="font-size: 2rem; color: var(--color-text-main);">My Ideas</h1>
                <p style="color: var(--color-text-muted);">Manage your submitted ideas</p>
            </div>
            <a href="{{ route('ideas.create') }}" class="btn btn-primary">Submit New Idea</a>
        </div>
        
        @include('partials.flash-messages')
        
        @if($ideas->count() > 0)
            <div class="card">
                <div class="card__content" style="padding: 0;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: var(--color-background); border-bottom: 1px solid var(--color-border);">
                                <th style="padding: var(--spacing-4); text-align: left;">Title</th>
                                <th style="padding: var(--spacing-4); text-align: center;">Category</th>
                                <th style="padding: var(--spacing-4); text-align: center;">Status</th>
                                <th style="padding: var(--spacing-4); text-align: center;">Votes</th>
                                <th style="padding: var(--spacing-4); text-align: center;">Date</th>
                                <th style="padding: var(--spacing-4); text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ideas as $idea)
                                <tr style="border-bottom: 1px solid var(--color-border);">
                                    <td style="padding: var(--spacing-4);">
                                        <a href="{{ route('ideas.show', $idea) }}" style="color: var(--color-primary); text-decoration: none; font-weight: 500;">
                                            {{ $idea->title }}
                                        </a>
                                    </td>
                                    <td style="padding: var(--spacing-4); text-align: center;">
                                        <span class="badge" style="background: var(--color-primary); color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem;">
                                            {{ $idea->category }}
                                        </span>
                                    </td>
                                    <td style="padding: var(--spacing-4); text-align: center;">
                                        <span class="badge" style="background: {{ $idea->status === 'approved' ? 'var(--color-success)' : ($idea->status === 'rejected' ? 'var(--color-error)' : 'var(--color-warning)') }}; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; text-transform: capitalize;">
                                            {{ $idea->status }}
                                        </span>
                                    </td>
                                    <td style="padding: var(--spacing-4); text-align: center;">{{ $idea->votes->count() }}</td>
                                    <td style="padding: var(--spacing-4); text-align: center; color: var(--color-text-muted);">{{ $idea->created_at->format('M d, Y') }}</td>
                                    <td style="padding: var(--spacing-4); text-align: center;">
                                        <a href="{{ route('ideas.show', $idea) }}" class="btn btn-sm btn-secondary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div style="margin-top: var(--spacing-6);">
                {{ $ideas->links() }}
            </div>
        @else
            @include('partials.empty-state', [
                'icon' => '💡',
                'title' => 'No Ideas Yet',
                'message' => 'You haven\'t submitted any ideas yet.',
                'actionLabel' => 'Submit Your First Idea',
                'actionRoute' => route('ideas.create')
            ])
        @endif
    </div>
</x-app-layout>
