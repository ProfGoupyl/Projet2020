<x-guest-layout>
    <div class="p">
        <section class="login">
            <x-auth-card>
                <x-slot name="logo">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </x-slot>

                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Il s'agit d'une zone sécurisée de l'application. Veuillez confirmer votre mot de passe avant de continuer.') }}
                </div>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form class="loginform" method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div>
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="btn btn-primary">
                        <x-button>
                            {{ __('Confirmer') }}
                        </x-button>
                    </div>
                </form>
            </x-auth-card>
        </section>
    </div>
</x-guest-layout>