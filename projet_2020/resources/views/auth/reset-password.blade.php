<x-guest-layout>
    <div class="p">
        <section class="login">
            <x-auth-card>
                <x-slot name="logo">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </x-slot>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form class="loginform" method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" class="block font-medium text-sm text-gray-700">
                            {{ __('Mot de passe') }}
                        </label>

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <label for="password_confirmation" class="block font-medium text-sm text-gray-700">
                            {{ __('Confirmation mot de passe') }}
                        </label>

                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                    </div>

                    <div class="btn btn-primary">
                        <x-button>
                            {{ __('Réinitialiser mon mot de passe') }}
                        </x-button>
                    </div>
                </form>
            </x-auth-card>
        </section>
    </div>
</x-guest-layout>