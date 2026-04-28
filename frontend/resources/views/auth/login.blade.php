<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            @if ($errors->has('email'))
                <div class="form-error">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" />
            @if ($errors->has('password'))
                <div class="form-error">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="form-group flex items-center gap-2">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me" style="color: var(--color-text-muted); font-size: 0.875rem;">{{ __('Remember me') }}</label>
        </div>

        <div class="flex items-center justify-between" style="margin-top: var(--spacing-6);">
            @if (Route::has('password.request'))
                <a style="font-size: 0.875rem; color: var(--color-text-muted);" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif

            <button type="submit" class="btn btn--primary">
                {{ __('Sign in') }}
            </button>
        </div>

        @if (Route::has('register'))
            <div style="margin-top: var(--spacing-8); text-align: center; border-top: 1px solid var(--color-border); padding-top: var(--spacing-6);">
                <p style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: var(--spacing-4);">Don't have an account yet?</p>
                <a href="{{ route('register') }}" class="btn btn--outline" style="width: 100%;">
                    Create New Account
                </a>
            </div>
        @endif
    </form>
</x-guest-layout>
