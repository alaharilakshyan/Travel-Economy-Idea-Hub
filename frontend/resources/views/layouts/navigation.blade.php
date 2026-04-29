<nav class="navbar" x-data="{ mobileMenuOpen: false }">
    <div class="navbar__container container">
        <a href="{{ route('home') ?? '/' }}" class="navbar__brand" style="display: flex; align-items: center; gap: 0.5rem;">
            <svg style="width: 24px; height: 24px; color: var(--color-primary);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Travel Idea Hub
        </a>

        <!-- Desktop Links -->
        <div class="navbar__links" style="display: none;">
            <a href="{{ route('home') ?? '/' }}" class="navbar__link {{ request()->routeIs('home') ? 'navbar__link--active' : '' }}">Home</a>
            <a href="{{ url('/ideas') }}" class="navbar__link {{ request()->is('ideas*') ? 'navbar__link--active' : '' }}">Idea Hub</a>
            <a href="{{ url('/events') }}" class="navbar__link {{ request()->is('events*') ? 'navbar__link--active' : '' }}">Events</a>
            <a href="{{ url('/about') }}" class="navbar__link {{ request()->is('about') ? 'navbar__link--active' : '' }}">About</a>
            <a href="{{ url('/mission') }}" class="navbar__link {{ request()->is('mission') ? 'navbar__link--active' : '' }}">Mission</a>
            <a href="{{ url('/contact') }}" class="navbar__link {{ request()->is('contact') ? 'navbar__link--active' : '' }}">Contact</a>
        </div>
        
        <!-- Ensure desktop links show on larger screens via inline style for now (since we lack tailwind classes in vanilla) -->
        <style>
            @media (min-width: 768px) {
                .navbar__links { display: flex !important; gap: var(--spacing-4); }
                .desktop-nav-actions { display: flex !important; }
                .mobile-menu-btn { display: none !important; }
            }
        </style>

        <div class="navbar__actions desktop-nav-actions" style="display: none; align-items: center; gap: var(--spacing-4);">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn--outline" style="padding: 0.4rem 1rem;">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn--secondary" style="padding: 0.4rem 1rem;">Log Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn--outline" style="padding: 0.4rem 1rem;">Log In</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn--primary" style="padding: 0.4rem 1rem;">Sign Up</a>
                @endif
            @endauth
        </div>

        <!-- Mobile Menu Button -->
        <button class="mobile-menu-btn" @click="mobileMenuOpen = !mobileMenuOpen" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: var(--color-text-main);">
            <svg x-show="!mobileMenuOpen" style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            <svg x-show="mobileMenuOpen" style="width: 24px; height: 24px; display: none;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" style="display: none; padding: var(--spacing-4) var(--spacing-4); background-color: var(--color-surface); border-top: 1px solid var(--color-border); flex-direction: column; gap: var(--spacing-4);">
        <a href="{{ route('home') ?? '/' }}" class="navbar__link">Home</a>
        <a href="{{ url('/ideas') }}" class="navbar__link">Idea Hub</a>
        <a href="{{ url('/events') }}" class="navbar__link">Events</a>
        <a href="{{ url('/about') }}" class="navbar__link">About</a>
        <a href="{{ url('/mission') }}" class="navbar__link">Mission</a>
        <a href="{{ url('/contact') }}" class="navbar__link">Contact</a>
        
        <div style="border-top: 1px solid var(--color-border); margin: var(--spacing-2) 0;"></div>
        
        @auth
            <a href="{{ route('dashboard') }}" class="navbar__link">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" style="margin-top: var(--spacing-2);">
                @csrf
                <button type="submit" class="btn btn--secondary" style="width: 100%;">Log Out</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn--outline" style="text-align: center; width: 100%;">Log In</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn--primary" style="text-align: center; width: 100%; margin-top: var(--spacing-2);">Sign Up</a>
            @endif
        @endauth
    </div>
</nav>
