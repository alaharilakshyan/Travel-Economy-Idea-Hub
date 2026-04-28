<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Travel Idea Hub') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- AlpineJS for basic reactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-card">
            <div class="auth-header">
                <a href="/">
                    <h1 class="auth-header__title">Travel Idea Hub</h1>
                </a>
                <p style="color: var(--color-text-muted); font-size: 0.875rem;">Discover the Soul of India</p>
            </div>

            {{ $slot }}
        </div>
    </div>
</body>
</html>
