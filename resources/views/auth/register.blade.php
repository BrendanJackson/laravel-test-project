<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" class="user">
            @csrf

            <div class="form-group">
                <x-jet-label for="first_name" value="First Name" class="d-none" />
                <x-jet-input id="first_name" class="form-control-user" type="text" name="first_name" :value="old('first_name')" placeholder="First Name" required autofocus autocomplete="first_name" />
            </div>

            <div class="form-group">
                <x-jet-label for="last_name" value="Last Name" class="d-none" />
                <x-jet-input id="last_name" class="form-control-user" type="text" name="last_name" :value="old('last_name')" placeholder="Last Name" required autofocus autocomplete="last_name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" class="d-none" />
                <x-jet-input id="email" class="form-control-user" type="email" name="email" :value="old('email')" required placeholder="{{ __('Email') }}" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" class="d-none" />
                <x-jet-input id="password" class="form-control-user" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="d-none" />
                <x-jet-input id="password_confirmation" class="form-control-user" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif
            <x-jet-button class="btn-primary btn-user btn-block mt-4">
                {{ __('Register') }}
            </x-jet-button>
        </form>
        <hr>
        <div class="text-center">
            <a class="text-sm" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
