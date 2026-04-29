@if ($paginator->hasPages())
    <div style="display: flex; justify-content: center; gap: var(--spacing-2); margin-top: var(--spacing-6);">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span style="padding: var(--spacing-2) var(--spacing-4); border: 1px solid var(--color-border); border-radius: 4px; color: var(--color-text-muted); cursor: not-allowed;">&laquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" style="padding: var(--spacing-2) var(--spacing-4); border: 1px solid var(--color-border); border-radius: 4px; color: var(--color-primary); text-decoration: none;">&laquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span style="padding: var(--spacing-2) var(--spacing-4); color: var(--color-text-muted);">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span style="padding: var(--spacing-2) var(--spacing-4); background: var(--color-primary); color: white; border-radius: 4px;">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" style="padding: var(--spacing-2) var(--spacing-4); border: 1px solid var(--color-border); border-radius: 4px; color: var(--color-primary); text-decoration: none;">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" style="padding: var(--spacing-2) var(--spacing-4); border: 1px solid var(--color-border); border-radius: 4px; color: var(--color-primary); text-decoration: none;">&raquo;</a>
        @else
            <span style="padding: var(--spacing-2) var(--spacing-4); border: 1px solid var(--color-border); border-radius: 4px; color: var(--color-text-muted); cursor: not-allowed;">&raquo;</span>
        @endif
    </div>
@endif
