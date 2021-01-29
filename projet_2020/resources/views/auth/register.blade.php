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

                <form class="loginform" method="POST" action="{{ route('register') }}">
                    @csrf
                    @method('put')

                    <!-- pseudo -->
                    <div class="mt-4">
                        <x-label for="pseudo" :value="__('Pseudo')" />

                        <x-input id="pseudo" class="block mt-1 w-full" type="text" name="pseudo" :value="old('pseudo')" autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Mot de passe *min 8 caractères')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirmation mot de passe')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                    </div>

                    <x-input id="token" class="block mt-1 w-full" type="hidden" name="token" value="{{ request('token') }}" />

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Déjà enregisté ?') }}
                        </a>

                        <x-button class="btn btn-primary">
                            {{ __('S\'enregister') }}
                        </x-button>
                    </div>
                </form>
            </x-auth-card>
        </section>
    </div>
</x-guest-layout>