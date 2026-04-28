<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About - Travel Idea Hub</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <div style="min-height: 100vh; display: flex; flex-direction: column;">
        @include('layouts.navigation')

        <main class="main-content container">
            <div style="max-width: 800px; margin: 0 auto; text-align: center; margin-bottom: var(--spacing-12);">
                <h1 style="font-size: 3rem; color: var(--color-secondary);">About Travel Idea Hub</h1>
                <p style="font-size: 1.25rem; color: var(--color-text-muted);">Empowering travelers to discover and improve Indian tourism.</p>
            </div>

            <div class="card" style="margin-bottom: var(--spacing-8);">
                <div class="card__content" style="padding: var(--spacing-8);">
                    <h2 style="color: var(--color-primary);">Our Mission</h2>
                    <p style="margin-bottom: var(--spacing-4);">Travel Idea Hub is dedicated to showcasing the vibrant, warm, and deeply cultural heritage of India. Our mission is two-fold: to help you plan unforgettable journeys, and to build a community-driven platform where travelers can suggest improvements for tourist spots.</p>
                    
                    <h2 style="color: var(--color-primary); margin-top: var(--spacing-6);">The Vision</h2>
                    <p>We envision a sustainable tourism ecosystem in India where every spot is well-maintained, accessible, and celebrated. By integrating an Idea Hub and Volunteer Event registration, we bridge the gap between enthusiastic tourists and local development.</p>
                </div>
            </div>
            
            <div style="text-align: center; margin-top: var(--spacing-8);">
                <a href="{{ route('home') }}" class="btn btn--outline">Back to Home</a>
            </div>
        </main>

        <footer style="background-color: var(--color-surface); padding: var(--spacing-8) 0; text-align: center; border-top: 1px solid var(--color-border); margin-top: auto;">
            <div class="container">
                <p style="color: var(--color-text-muted);">&copy; {{ date('Y') }} Travel Idea Hub. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
