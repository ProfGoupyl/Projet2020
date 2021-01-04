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

            <form method="post" action="/users">
                @csrf
                <input type="hidden" value="sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9" name="api_token">

                <!-- Name -->
                <div>
                    <x-label for="name" type="text" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"  required autofocus />
                </div>

                <!-- Prénom -->
                <div class="mt-4">
                    <x-label for="prenom" :value="__('Prénom')" />

                    <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom"  required autofocus />
                </div>

    
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"  required />
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('M\'inscrire') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
</div>

<div id="showUser">

<h1>Tableau des utilisateurs</h1>

<?php dd($users); ?>
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
            
        @foreach ($users as $user)
           <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->prenom}}</td>
            <td>{{$user->pseudo}}</td>
            <td>{{$user->email}}</td>
            <td><input type="checkbox" id="admin" name="admin" value="admin"></td>
            <td><a href="#">Modifer</a>
                <a href="#">Supprimer</a>
            </td>
        </tr> 
        @endforeach
        

        </tbody>
    </table>

</div>


</div>

