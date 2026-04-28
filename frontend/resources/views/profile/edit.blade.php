<x-app-layout>
    <x-slot name="header">
        <h2 style="font-family: var(--font-heading); font-size: 1.5rem; color: var(--color-text-main);">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div style="padding: var(--spacing-8) 0; display: flex; flex-direction: column; gap: var(--spacing-6);">
        <div class="card">
            <div class="card__content" style="max-width: 600px;">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="card">
            <div class="card__content" style="max-width: 600px;">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="card">
            <div class="card__content" style="max-width: 600px;">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
