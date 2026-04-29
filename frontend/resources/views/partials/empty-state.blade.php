<div style="text-align: center; padding: var(--spacing-16) var(--spacing-8);">
    <div style="font-size: 4rem; margin-bottom: var(--spacing-4);">{{ $icon ?? '📭' }}</div>
    <h3 style="font-size: 1.5rem; color: var(--color-text-main); margin-bottom: var(--spacing-2);">{{ $title ?? 'Nothing Here' }}</h3>
    <p style="color: var(--color-text-muted); margin-bottom: var(--spacing-6); max-width: 400px; margin-left: auto; margin-right: auto;">{{ $message ?? 'There are no items to display.' }}</p>
    @if(isset($actionLabel) && isset($actionRoute))
        <a href="{{ $actionRoute }}" class="btn btn-primary">{{ $actionLabel }}</a>
    @endif
</div>
