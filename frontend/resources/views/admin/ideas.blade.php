<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-6);">
            <h1 style="font-size: 2rem; color: var(--color-text-main);">Manage Ideas</h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
        </div>
        
        @include('partials.flash-messages')
        
        <div class="card">
            <div class="card__content" style="padding: 0;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: var(--color-background); border-bottom: 1px solid var(--color-border);">
                            <th style="padding: var(--spacing-4); text-align: left;">Title</th>
                            <th style="padding: var(--spacing-4); text-align: center;">Author</th>
                            <th style="padding: var(--spacing-4); text-align: center;">Category</th>
                            <th style="padding: var(--spacing-4); text-align: center;">Status</th>
                            <th style="padding: var(--spacing-4); text-align: center;">Votes</th>
                            <th style="padding: var(--spacing-4); text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ideas as $idea)
                            <tr style="border-bottom: 1px solid var(--color-border);">
                                <td style="padding: var(--spacing-4);">
                                    <a href="{{ route('ideas.show', $idea) }}" style="color: var(--color-primary); text-decoration: none; font-weight: 500;">
                                        {{ Str::limit($idea->title, 40) }}
                                    </a>
                                </td>
                                <td style="padding: var(--spacing-4); text-align: center;">{{ $idea->user->name }}</td>
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
                                <td style="padding: var(--spacing-4); text-align: center;">
                                    <form action="{{ route('admin.ideas.status', $idea) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" style="padding: var(--spacing-2) var(--spacing-3); border: 1px solid var(--color-border); border-radius: 4px; font-size: 0.875rem;">
                                            <option value="pending" {{ $idea->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved" {{ $idea->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="rejected" {{ $idea->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </form>
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
    </div>
</x-app-layout>
