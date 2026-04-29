@if(session('success'))
    <div style="background: var(--color-success); color: white; padding: var(--spacing-4); border-radius: 8px; margin-bottom: var(--spacing-4);">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background: var(--color-error); color: white; padding: var(--spacing-4); border-radius: 8px; margin-bottom: var(--spacing-4);">
        {{ session('error') }}
    </div>
@endif

@if(session('warning'))
    <div style="background: var(--color-warning); color: white; padding: var(--spacing-4); border-radius: 8px; margin-bottom: var(--spacing-4);">
        {{ session('warning') }}
    </div>
@endif

@if($errors->any())
    <div style="background: var(--color-error); color: white; padding: var(--spacing-4); border-radius: 8px; margin-bottom: var(--spacing-4);">
        <ul style="margin: 0; padding-left: var(--spacing-4);">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
