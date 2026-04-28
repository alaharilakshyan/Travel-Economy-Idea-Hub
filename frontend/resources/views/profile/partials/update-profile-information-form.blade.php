<section>
    <header>
        <h2 style="font-family: var(--font-heading); font-size: 1.25rem;">
            {{ __('Profile Information') }}
        </h2>
        <p style="color: var(--color-text-muted); font-size: 0.875rem; margin-top: var(--spacing-1);">
            {{ __("Update your account's profile information, email address, and avatar.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" style="margin-top: var(--spacing-6); display: flex; flex-direction: column; gap: var(--spacing-4);">
        @csrf
        @method('patch')

        <!-- Avatar -->
        <div class="form-group flex items-center gap-4">
            @if($user->avatar)
                <img src="{{ Storage::url($user->avatar) }}" alt="Avatar" style="width: 64px; height: 64px; border-radius: 50%; object-fit: cover;">
            @else
                <div style="width: 64px; height: 64px; border-radius: 50%; background-color: var(--color-border); display: flex; align-items: center; justify-content: center; font-weight: bold; color: var(--color-text-muted);">
                    {{ substr($user->name, 0, 1) }}
                </div>
            @endif
            <div style="flex-grow: 1;">
                <label for="avatar" class="form-label">{{ __('Avatar Image (Optional)') }}</label>
                <input id="avatar" name="avatar" type="file" accept="image/*" class="form-input" style="padding: 0.5rem;" />
                @if ($errors->has('avatar'))
                    <div class="form-error">{{ $errors->first('avatar') }}</div>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="form-input" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @if ($errors->has('name'))
                <div class="form-error">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-input" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @if ($errors->has('email'))
                <div class="form-error">{{ $errors->first('email') }}</div>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div style="margin-top: var(--spacing-2);">
                    <p style="font-size: 0.875rem;">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" style="background: none; border: none; color: var(--color-primary); cursor: pointer; text-decoration: underline;">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p style="margin-top: var(--spacing-2); color: var(--color-success); font-size: 0.875rem;">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn--primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    style="font-size: 0.875rem; color: var(--color-text-muted); margin-left: var(--spacing-4);"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
