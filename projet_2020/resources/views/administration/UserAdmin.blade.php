<!-- Reprend le tableau des utilisateur avec le CRUD + Suppression des étudiants/cours à la fin de l'année scolaire -->

<!-- Creat New user -->
<button class="btn btn-primary addUser">+ Ajouter un utilisateur</button>
<script>
    const btnAddUser = document.querySelector('.addUser');
    const addUser = document.querySelector('#addUser');

    btn.addEventListener('click', () => {
        text.classList.toggle('is-visible');
    })
</script>
<style>
#addUser{
    display:none;
}
#addUser.is-visible{
    display:block;
}
</style>
<div id="addUser">
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Nom')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Prénom -->
                <div class="mt-4">
                    <x-label for="prenom" :value="__('Prénom')" />

                    <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
                </div>

                <!-- Pseudo -->
                <div class="mt-4">
                    <x-label for="pseudo" :value="__('Pseudo')" />

                    <x-input id="pseudo" class="block mt-1 w-full" type="text" name="pseudo" :value="old('pseudo')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
</div>

<div id="showUser">

<h1>Tableau des utilisateurs</h1>


<div class="col-12">
    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>prenom</th>
            <th>pseudo</th>
            <th>email</th>
            <th>admin</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($users as $urser) ?>
        <tr>
            <td>{{user.name}}</td>
            <td>{{user.prenom}}</td>
            <td>{{user.pseudo}}</td>
            <td>{{user.email}}</td>
            <td><input type="checkbox" id="admin" name="admin" value="admin"></td>
            <td><a href="{{Modify,id}}"></a>
                <a href="{{Delete,id}}"></a>
            </td>
        </tr>

        </tbody>
    </table>
</div>


</div>

