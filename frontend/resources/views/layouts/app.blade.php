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
    <div style="min-height: 100vh; display: flex; flex-direction: column;">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header style="background-color: var(--color-surface); box-shadow: 0 1px 3px rgba(0,0,0,0.05); padding: var(--spacing-6) 0;">
                <div class="container">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="main-content container" style="flex-grow: 1;">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
