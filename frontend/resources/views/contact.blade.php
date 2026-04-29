<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0;">
        <!-- Hero Section -->
        <div style="text-align: center; margin-bottom: var(--spacing-10); padding: var(--spacing-10) var(--spacing-6); background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); border-radius: 16px; color: white;">
            <h1 style="font-size: 3rem; margin-bottom: var(--spacing-4);">Contact Us</h1>
            <p style="font-size: 1.25rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">Have questions, suggestions, or feedback? We'd love to hear from you.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--spacing-8);">
            <!-- Contact Form -->
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-8);">
                    <h2 style="color: var(--color-primary); margin-bottom: var(--spacing-6);">Send us a Message</h2>
                    <form action="#" method="POST" style="display: flex; flex-direction: column; gap: var(--spacing-4);">
                        @csrf
                        <div>
                            <label for="name" style="display: block; margin-bottom: var(--spacing-2); font-weight: 500;">Name</label>
                            <input type="text" id="name" name="name" class="form-input" style="width: 100%; padding: var(--spacing-3); border: 1px solid var(--color-border); border-radius: 8px;" required>
                        </div>
                        
                        <div>
                            <label for="email" style="display: block; margin-bottom: var(--spacing-2); font-weight: 500;">Email Address</label>
                            <input type="email" id="email" name="email" class="form-input" style="width: 100%; padding: var(--spacing-3); border: 1px solid var(--color-border); border-radius: 8px;" required>
                        </div>

                        <div>
                            <label for="subject" style="display: block; margin-bottom: var(--spacing-2); font-weight: 500;">Subject</label>
                            <select id="subject" name="subject" class="form-input" style="width: 100%; padding: var(--spacing-3); border: 1px solid var(--color-border); border-radius: 8px; background: white;">
                                <option>General Inquiry</option>
                                <option>Feedback</option>
                                <option>Report an Issue</option>
                                <option>Partnership</option>
                                <option>Other</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="message" style="display: block; margin-bottom: var(--spacing-2); font-weight: 500;">Message</label>
                            <textarea id="message" name="message" class="form-input" rows="5" style="width: 100%; padding: var(--spacing-3); border: 1px solid var(--color-border); border-radius: 8px; resize: vertical;" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="margin-top: var(--spacing-4);">Send Message</button>
                    </form>
                </div>
            </div>

            <!-- Contact Info -->
            <div>
                <div class="card" style="margin-bottom: var(--spacing-6);">
                    <div class="card__content" style="padding: var(--spacing-6);">
                        <h3 style="margin-bottom: var(--spacing-4); color: var(--color-primary);">Get in Touch</h3>
                        <div style="display: flex; flex-direction: column; gap: var(--spacing-4);">
                            <div style="display: flex; align-items: center; gap: var(--spacing-3);">
                                <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--color-background); display: flex; align-items: center; justify-content: center;">📧</div>
                                <div>
                                    <div style="font-weight: 500;">Email</div>
                                    <div style="color: var(--color-text-muted); font-size: 0.875rem;">hello@travelideahub.com</div>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center; gap: var(--spacing-3);">
                                <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--color-background); display: flex; align-items: center; justify-content: center;">📍</div>
                                <div>
                                    <div style="font-weight: 500;">Location</div>
                                    <div style="color: var(--color-text-muted); font-size: 0.875rem;">Bangalore, Karnataka, India</div>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center; gap: var(--spacing-3);">
                                <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--color-background); display: flex; align-items: center; justify-content: center;">⏰</div>
                                <div>
                                    <div style="font-weight: 500;">Response Time</div>
                                    <div style="color: var(--color-text-muted); font-size: 0.875rem;">Within 24-48 hours</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card__content" style="padding: var(--spacing-6);">
                        <h3 style="margin-bottom: var(--spacing-4); color: var(--color-primary);">Follow Us</h3>
                        <div style="display: flex; gap: var(--spacing-3);">
                            <a href="#" style="width: 44px; height: 44px; border-radius: 50%; background: #1DA1F2; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none;">𝕏</a>
                            <a href="#" style="width: 44px; height: 44px; border-radius: 50%; background: #4267B2; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none;">f</a>
                            <a href="#" style="width: 44px; height: 44px; border-radius: 50%; background: #E4405F; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none;">📷</a>
                            <a href="#" style="width: 44px; height: 44px; border-radius: 50%; background: #0077b5; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none;">in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
