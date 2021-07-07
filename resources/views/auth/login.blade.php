<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="title">
            Welcome Back!
        </x-slot>
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form class="user" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <x-jet-label for="email" value="{{ __('Email') }}" class="d-none" />
                <x-jet-input id="email" class="form-control-user" type="email" name="email" :value="old('email')" placeholder="{{ __('Email') }}" required />
            </div>
            <div class="form-group">
                <x-jet-label for="password" value="{{ __('Password') }}" class="d-none" />
                <x-jet-input id="password" class="form-control-user" type="password" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}" />
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" name="remember" class="custom-control-input" id="rememberCheck">
                    <label class="custom-control-label" for="rememberCheck">{{ __('Remember me') }}</label>
                </div>
            </div>
            <x-jet-button class="btn-primary btn-user btn-block">
                {{ __('Log in') }}
            </x-jet-button>
        </form>
        <hr>
        @if (Route::has('password.request'))
            <div class="text-center">
                <a class="small" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
            </div>
        @endif
        <div class="text-center">
            <a class="small" href="{{ route('register') }}">Create an Account!</a>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
