<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact - Travel Idea Hub</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <div style="min-height: 100vh; display: flex; flex-direction: column;">
        @include('layouts.navigation')

        <main class="main-content container">
            <div style="max-width: 600px; margin: 0 auto;">
                <h1 style="font-size: 3rem; color: var(--color-secondary); text-align: center; margin-bottom: var(--spacing-2);">Contact Us</h1>
                <p style="font-size: 1.125rem; color: var(--color-text-muted); text-align: center; margin-bottom: var(--spacing-8);">Have questions or feedback? We'd love to hear from you.</p>

                <div class="card">
                    <div class="card__content" style="padding: var(--spacing-8);">
                        <form action="#" method="POST" style="display: flex; flex-direction: column; gap: var(--spacing-4);">
                            @csrf
                            <div class="form-group" style="margin-bottom: 0;">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" class="form-input" required>
                            </div>
                            
                            <div class="form-group" style="margin-bottom: 0;">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" name="email" class="form-input" required>
                            </div>
                            
                            <div class="form-group" style="margin-bottom: 0;">
                                <label for="message" class="form-label">Message</label>
                                <textarea id="message" name="message" class="form-input" rows="5" required></textarea>
                            </div>
                            
                            <button type="button" class="btn btn--primary" style="margin-top: var(--spacing-4);" onclick="alert('Message sent! (Demo only)')">Send Message</button>
                        </form>
                    </div>
                </div>
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
