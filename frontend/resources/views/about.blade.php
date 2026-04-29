<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <!-- Hero Section -->
        <div style="text-align: center; margin-bottom: var(--spacing-12); padding: var(--spacing-12) var(--spacing-6); background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); border-radius: 16px; color: white;">
            <h1 style="font-size: 3rem; margin-bottom: var(--spacing-4);">About Travel Idea Hub</h1>
            <p style="font-size: 1.25rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">Empowering travelers to discover, share, and improve Indian tourism through community-driven innovation.</p>
        </div>

        <!-- Stats Section -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--spacing-6); margin-bottom: var(--spacing-10);">
            <div class="card" style="text-align: center; padding: var(--spacing-6);">
                <div style="font-size: 2.5rem; font-weight: bold; color: var(--color-primary);">🇮🇳</div>
                <h3 style="margin-top: var(--spacing-3);">28 States</h3>
                <p style="color: var(--color-text-muted);">Covered across India</p>
            </div>
            <div class="card" style="text-align: center; padding: var(--spacing-6);">
                <div style="font-size: 2.5rem; font-weight: bold; color: var(--color-primary);">💡</div>
                <h3 style="margin-top: var(--spacing-3);">Idea Hub</h3>
                <p style="color: var(--color-text-muted);">Share & discover tips</p>
            </div>
            <div class="card" style="text-align: center; padding: var(--spacing-6);">
                <div style="font-size: 2.5rem; font-weight: bold; color: var(--color-primary);">🤝</div>
                <h3 style="margin-top: var(--spacing-3);">Volunteer</h3>
                <p style="color: var(--color-text-muted);">Join community events</p>
            </div>
            <div class="card" style="text-align: center; padding: var(--spacing-6);">
                <div style="font-size: 2.5rem; font-weight: bold; color: var(--color-primary);">🤖</div>
                <h3 style="margin-top: var(--spacing-3);">AI Assistant</h3>
                <p style="color: var(--color-text-muted);">24/7 travel help</p>
            </div>
        </div>

        <!-- Our Story -->
        <div class="card" style="margin-bottom: var(--spacing-8);">
            <div class="card__content" style="padding: var(--spacing-8);">
                <h2 style="color: var(--color-primary); margin-bottom: var(--spacing-4);">Our Story</h2>
                <p style="margin-bottom: var(--spacing-4); line-height: 1.8;">Travel Idea Hub was born from a simple observation: travelers visiting India often discover hidden gems, local secrets, and areas needing improvement that never get shared with the wider community.</p>
                <p style="margin-bottom: var(--spacing-4); line-height: 1.8;">We created a platform where every traveler becomes a contributor. Whether it's a secluded beach in Kerala, a family-run dhaba in Punjab, or a historic haveli in Rajasthan waiting for restoration - your insights help others and drive positive change.</p>
            </div>
        </div>

        <!-- What We Offer -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--spacing-6); margin-bottom: var(--spacing-10);">
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-6);">
                    <div style="width: 60px; height: 60px; border-radius: 12px; background: var(--color-primary); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; margin-bottom: var(--spacing-4);">💡</div>
                    <h3 style="margin-bottom: var(--spacing-3);">Community Ideas</h3>
                    <p style="color: var(--color-text-muted);">Share and discover travel ideas, hidden spots, budget tips, and authentic experiences from fellow travelers across India.</p>
                </div>
            </div>
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-6);">
                    <div style="width: 60px; height: 60px; border-radius: 12px; background: var(--color-secondary); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; margin-bottom: var(--spacing-4);">🤝</div>
                    <h3 style="margin-bottom: var(--spacing-3);">Volunteer Events</h3>
                    <p style="color: var(--color-text-muted);">Join hands with local communities for beach cleanups, heritage restoration, and sustainable tourism initiatives.</p>
                </div>
            </div>
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-6);">
                    <div style="width: 60px; height: 60px; border-radius: 12px; background: var(--color-success); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; margin-bottom: var(--spacing-4);">🤖</div>
                    <h3 style="margin-bottom: var(--spacing-3);">AI Travel Assistant</h3>
                    <p style="color: var(--color-text-muted);">Get instant personalized travel advice, itinerary suggestions, and budget planning powered by Gemini AI.</p>
                </div>
            </div>
        </div>

        <!-- Our Mission -->
        <div class="card" style="margin-bottom: var(--spacing-8);">
            <div class="card__content" style="padding: var(--spacing-8);">
                <h2 style="color: var(--color-primary); margin-bottom: var(--spacing-4);">Our Mission</h2>
                <p style="margin-bottom: var(--spacing-4); line-height: 1.8;">We are dedicated to showcasing the vibrant, warm, and deeply cultural heritage of India. Our mission is two-fold: to help you plan unforgettable journeys while building a community-driven platform where travelers can suggest improvements for tourist spots.</p>
                <p style="line-height: 1.8;">We envision a sustainable tourism ecosystem in India where every spot is well-maintained, accessible, and celebrated. By integrating an Idea Hub and Volunteer Event registration, we bridge the gap between enthusiastic tourists and local development.</p>
            </div>
        </div>

        <!-- Join Us CTA -->
        <div style="text-align: center; padding: var(--spacing-8); background: var(--color-background); border-radius: 16px;">
            <h2 style="margin-bottom: var(--spacing-4);">Ready to Explore India?</h2>
            <p style="margin-bottom: var(--spacing-6); color: var(--color-text-muted);">Join our community of travelers and start sharing your discoveries today.</p>
            <div style="display: flex; gap: var(--spacing-4); justify-content: center;">
                <a href="{{ route('ideas.index') }}" class="btn btn-primary">Explore Ideas</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Join Community</a>
            </div>
        </div>
    </div>
</x-app-layout>
