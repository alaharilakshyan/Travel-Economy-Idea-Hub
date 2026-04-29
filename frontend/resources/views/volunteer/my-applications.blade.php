<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-6);">
            <div>
                <h1 style="font-size: 2rem; color: var(--color-text-main);">My Volunteer Applications</h1>
                <p style="color: var(--color-text-muted);">Track your volunteer registrations</p>
            </div>
            <a href="{{ route('volunteer.index') }}" class="btn btn-primary">Find Opportunities</a>
        </div>
        
        @include('partials.flash-messages')
        
        @if($applications->count() > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: var(--spacing-6);">
                @foreach($applications as $application)
                    <div class="card">
                        <div class="card__content" style="padding: var(--spacing-6);">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--spacing-4);">
                                <span class="badge" style="background: var(--color-secondary); color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem;">
                                    {{ $application->activity->location }}
                                </span>
                                <span class="badge" style="background: {{ $application->status === 'approved' ? 'var(--color-success)' : ($application->status === 'rejected' ? 'var(--color-error)' : 'var(--color-warning)') }}; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; text-transform: capitalize;">
                                    {{ $application->status }}
                                </span>
                            </div>
                            
                            <h3 style="font-size: 1.25rem; margin-bottom: var(--spacing-3); color: var(--color-text-main);">
                                {{ $application->activity->title }}
                            </h3>
                            
                            <div style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: var(--spacing-4);">
                                <div style="margin-bottom: var(--spacing-1);">
                                    <span style="font-weight: 500;">Date:</span> {{ $application->activity->start_date->format('F d, Y') }}
                                </div>
                                <div style="margin-bottom: var(--spacing-1);">
                                    <span style="font-weight: 500;">Time:</span> {{ $application->activity->start_date->format('h:i A') }} - {{ $application->activity->end_date->format('h:i A') }}
                                </div>
                                <div>
                                    <span style="font-weight: 500;">Applied:</span> {{ $application->created_at->format('M d, Y') }}
                                </div>
                            </div>
                            
                            @if($application->message)
                                <div style="background: var(--color-background); padding: var(--spacing-3); border-radius: 8px; margin-bottom: var(--spacing-4);">
                                    <span style="font-size: 0.75rem; color: var(--color-text-muted); text-transform: uppercase;">Your Message</span>
                                    <p style="font-size: 0.875rem; margin-top: var(--spacing-1);">{{ $application->message }}</p>
                                </div>
                            @endif
                            
                            <a href="{{ route('volunteer.show', $application->activity) }}" class="btn btn-secondary" style="display: block; text-align: center;">View Activity Details</a>
                            
                            @if($application->status === 'approved')
                                <div style="margin-top: var(--spacing-4); text-align: center;">
                                    <button onclick="showQRModal('{{ $application->activity->title }}', '{{ $application->user->name }}', '{{ $application->activity->start_date->format('Y-m-d') }}')" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: var(--spacing-2);">
                                        <span>📱</span>
                                        <span>Show QR Code</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div style="margin-top: var(--spacing-6);">
                {{ $applications->links() }}
            </div>
        @else
            @include('partials.empty-state', [
                'icon' => '🤝',
                'title' => 'No Applications Yet',
                'message' => 'You haven\'t registered for any volunteer activities.',
                'actionLabel' => 'Browse Opportunities',
                'actionRoute' => route('volunteer.index')
            ])
        @endif
    </div>

    <!-- QR Modal -->
    <div id="qrModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
        <div style="background: white; padding: var(--spacing-6); border-radius: 12px; max-width: 400px; width: 90%; text-align: center;">
            <h3 style="margin-bottom: var(--spacing-4);">Your Volunteer Pass</h3>
            <div id="qrImage" style="margin-bottom: var(--spacing-4);"></div>
            <div id="qrDetails" style="margin-bottom: var(--spacing-4); font-size: 0.875rem; color: var(--color-text-muted);"></div>
            <button onclick="closeQRModal()" class="btn btn-secondary">Close</button>
        </div>
    </div>

    <script>
        function showQRModal(activityTitle, userName, date) {
            const modal = document.getElementById('qrModal');
            const qrImage = document.getElementById('qrImage');
            const qrDetails = document.getElementById('qrDetails');
            
            const qrData = `ACTIVITY:${activityTitle}|USER:${userName}|DATE:${date}`;
            qrImage.innerHTML = `<img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${encodeURIComponent(qrData)}" alt="QR Code" style="max-width: 200px;">`;
            qrDetails.innerHTML = `<strong>${activityTitle}</strong><br>${userName}<br>${date}`;
            
            modal.style.display = 'flex';
        }
        
        function closeQRModal() {
            document.getElementById('qrModal').style.display = 'none';
        }
        
        document.getElementById('qrModal').addEventListener('click', function(e) {
            if (e.target === this) closeQRModal();
        });
    </script>
</x-app-layout>
