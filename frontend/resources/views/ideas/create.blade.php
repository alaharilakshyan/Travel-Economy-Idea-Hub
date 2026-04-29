<x-app-layout>
    <div class="container" style="padding: var(--spacing-8) 0; max-width: 800px;">
        <div style="margin-bottom: var(--spacing-6);">
            <a href="{{ route('ideas.index') }}" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: var(--spacing-2);">
                ← Back to Ideas
            </a>
        </div>

        <h1 style="font-size: 2rem; color: var(--color-text-main); margin-bottom: var(--spacing-2);">Submit Your Travel Idea</h1>
        <p style="color: var(--color-text-muted); margin-bottom: var(--spacing-6);">Share your hidden gems, tips, and recommendations with the community</p>

        @include('partials.flash-messages')

        @auth
            <div class="card">
                <div class="card__content" style="padding: var(--spacing-6);">
                    <form action="{{ route('ideas.store') }}" method="POST" enctype="multipart/form-data" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--spacing-4);">
                        @csrf
                        <div style="grid-column: 1 / -1;">
                            <label style="display: block; margin-bottom: var(--spacing-2); font-weight: 500;">Title</label>
                            <input type="text" name="title" class="form-input" style="width: 100%; padding: var(--spacing-3); border: 1px solid var(--color-border); border-radius: 8px;" placeholder="e.g., Hidden Beach in Goa" required>
                        </div>
                        
                        <div>
                            <label style="display: block; margin-bottom: var(--spacing-2); font-weight: 500;">Category</label>
                            <select name="category" class="form-input" style="width: 100%; padding: var(--spacing-3); border: 1px solid var(--color-border); border-radius: 8px; background: white;" required>
                                <option value="">Select category...</option>
                                <option value="beach">Beach</option>
                                <option value="mountain">Mountain</option>
                                <option value="city">City</option>
                                <option value="heritage">Heritage</option>
                                <option value="wildlife">Wildlife</option>
                                <option value="food">Food & Cuisine</option>
                                <option value="adventure">Adventure</option>
                                <option value="budget">Budget Travel</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div>
                            <label style="display: block; margin-bottom: var(--spacing-2); font-weight: 500;">Location</label>
                            <input type="text" name="location" class="form-input" style="width: 100%; padding: var(--spacing-3); border: 1px solid var(--color-border); border-radius: 8px;" placeholder="e.g., North Goa, Goa">
                        </div>
                        
                        <div style="grid-column: 1 / -1;">
                            <label style="display: block; margin-bottom: var(--spacing-2); font-weight: 500;">Description</label>
                            <textarea name="description" rows="6" class="form-input" style="width: 100%; padding: var(--spacing-3); border: 1px solid var(--color-border); border-radius: 8px; resize: vertical;" placeholder="Describe your idea, tips, and why it's worth visiting..." required></textarea>
                        </div>
                        
                        <div style="grid-column: 1 / -1;">
                            <label style="display: block; margin-bottom: var(--spacing-2); font-weight: 500;">
                                Attach Media <span style="color: var(--color-text-muted); font-weight: normal;">(Images, Videos, Documents - Max 10MB each)</span>
                            </label>
                            <input type="file" name="media[]" multiple accept="image/*,video/*,.pdf,.doc,.docx" class="form-input" style="width: 100%; padding: var(--spacing-3); border: 1px solid var(--color-border); border-radius: 8px; background: white;">
                            <p style="font-size: 0.75rem; color: var(--color-text-muted); margin-top: var(--spacing-1);">
                                Accepted: JPG, PNG, GIF, MP4, AVI, MOV, PDF, DOC, DOCX
                            </p>
                        </div>
                        
                        <div style="grid-column: 1 / -1;">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Idea</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="card" style="background: var(--color-background);">
                <div class="card__content" style="padding: var(--spacing-6); text-align: center;">
                    <p style="color: var(--color-text-muted); margin-bottom: var(--spacing-4);">Sign in to share your travel ideas with the community!</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Sign In to Submit</a>
                </div>
            </div>
        @endauth
    </div>
</x-app-layout>
