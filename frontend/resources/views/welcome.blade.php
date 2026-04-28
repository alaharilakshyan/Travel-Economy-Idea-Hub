<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travel Idea Hub - Discover India</title>
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- AlpineJS for basic reactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        .hero {
            background-color: var(--color-secondary);
            color: white;
            padding: var(--spacing-16) 0;
            text-align: center;
            background-image: linear-gradient(rgba(13, 110, 110, 0.9), rgba(13, 110, 110, 0.8)), url('https://images.unsplash.com/photo-1524492412937-b28074a5d7da?auto=format&fit=crop&q=80&w=1600');
            background-size: cover;
            background-position: center;
        }
        
        .hero h1 {
            color: white;
            font-size: 3rem;
            margin-bottom: var(--spacing-4);
        }
        
        .hero p {
            font-size: 1.25rem;
            max-width: 600px;
            margin: 0 auto var(--spacing-8) auto;
            opacity: 0.9;
        }
        
        .features {
            padding: var(--spacing-16) 0;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: var(--spacing-8);
            margin-top: var(--spacing-8);
        }
        
        @media (min-width: 768px) {
            .features-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--color-primary);
            margin-bottom: var(--spacing-4);
        }
        
        .footer {
            background-color: var(--color-surface);
            padding: var(--spacing-8) 0;
            text-align: center;
            border-top: 1px solid var(--color-border);
            margin-top: auto;
        }
    </style>
</head>
<body>
    <div style="min-height: 100vh; display: flex; flex-direction: column;">
        @include('layouts.navigation')

        <main>
            <section class="hero">
                <div class="container">
                    <h1>Discover the Soul of India</h1>
                    <p>Plan your perfect trip, explore hidden gems, share improvement ideas, and volunteer to make tourism better across India.</p>
                    <div style="display: flex; gap: var(--spacing-4); justify-content: center; flex-wrap: wrap;">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn--primary">Go to Dashboard</a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn--primary" style="font-size: 1.125rem; padding: 0.75rem 2rem;">Start Exploring</a>
                            <a href="{{ route('login') }}" class="btn btn--outline" style="background-color: white; color: var(--color-secondary); font-size: 1.125rem; padding: 0.75rem 2rem; border: none;">Sign In</a>
                        @endauth
                    </div>
                </div>
            </section>

            <section class="features container">
                <div style="text-align: center; max-width: 800px; margin: 0 auto;">
                    <h2 style="font-size: 2.5rem; color: var(--color-secondary);">Why Travel Idea Hub?</h2>
                    <p style="color: var(--color-text-muted); font-size: 1.125rem;">We believe in sustainable, culturally rich, and well-planned tourism. Join our platform to elevate the Indian travel experience.</p>
                </div>
                
                <div class="features-grid">
                    <div class="card p-6" style="padding: var(--spacing-6); text-align: center;">
                        <div class="feature-icon">🗺️</div>
                        <h3 style="font-size: 1.25rem;">Discover Spots</h3>
                        <p style="color: var(--color-text-muted);">Find breathtaking heritage sites, serene nature escapes, and spiritual destinations curated across 28 states.</p>
                    </div>
                    
                    <div class="card p-6" style="padding: var(--spacing-6); text-align: center;">
                        <div class="feature-icon">💡</div>
                        <h3 style="font-size: 1.25rem;">Share Ideas</h3>
                        <p style="color: var(--color-text-muted);">Notice something that could be improved at a tourist spot? Share your ideas and upvote suggestions from the community.</p>
                    </div>
                    
                    <div class="card p-6" style="padding: var(--spacing-6); text-align: center;">
                        <div class="feature-icon">🤝</div>
                        <h3 style="font-size: 1.25rem;">Volunteer</h3>
                        <p style="color: var(--color-text-muted);">Register for local cleanup drives and cultural events. Give back to the incredible places you visit.</p>
                    </div>
                </div>
            </section>
        </main>

        <footer class="footer">
            <div class="container">
                <p style="color: var(--color-text-muted);">&copy; {{ date('Y') }} Travel Idea Hub. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
