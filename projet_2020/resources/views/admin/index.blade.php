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

<<<<<<< HEAD:projet_2020/resources/views/admin/usersAdmin.blade.php
            <form method="POST" action="http://localhost:8000/api/users">
=======
            <form method="post" action="/users">
>>>>>>> cfafae8dbc4cf7db16531a3a80d14a664bf35f30:projet_2020/resources/views/admin/index.blade.php
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

<<<<<<< HEAD:projet_2020/resources/views/admin/usersAdmin.blade.php
                    <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
                </div>
=======
                    <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom"  required autofocus />
                </div>

    
>>>>>>> cfafae8dbc4cf7db16531a3a80d14a664bf35f30:projet_2020/resources/views/admin/index.blade.php
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"  required />
                </div>
<<<<<<< HEAD:projet_2020/resources/views/admin/usersAdmin.blade.php
=======


>>>>>>> cfafae8dbc4cf7db16531a3a80d14a664bf35f30:projet_2020/resources/views/admin/index.blade.php
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
<<<<<<< HEAD:projet_2020/resources/views/admin/usersAdmin.blade.php
        @foreach($users as $user)
        <tr>
            <td>{{user.name}}</td>
            <td>{{user.prenom}}</td>
            <td>{{user.pseudo}}</td>
            <td>{{user.email}}</td>
=======
            
        @foreach ($users as $user)
<<<<<<< HEAD:projet_2020/resources/views/admin/index.blade.php
           <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->prenom}}</td>
            <td>{{$user->pseudo}}</td>
            <td>{{$user->email}}</td>
>>>>>>> cfafae8dbc4cf7db16531a3a80d14a664bf35f30:projet_2020/resources/views/admin/index.blade.php
            <td><input type="checkbox" id="admin" name="admin" value="admin"></td>
            <td><a href="#">Modifer</a>
                <a href="#">Supprimer</a>
            </td>
<<<<<<< HEAD:projet_2020/resources/views/admin/usersAdmin.blade.php
        </tr>
        @endforeach
=======
=======
        <tr>
            <form action="/admin/users/{{ $user->id }}" method="post">
                @csrf
                @method('put')
                <td>
                    <input class="input-{{$user->id}}" style="background:none;border:none;color:black;" disabled value={{$user->name}} type="text" name="name">
                </td>
                <td>
                    <input class="input-{{$user->id}}" style="background:none;border:none;color:black;" disabled type="text" name="prenom" value="{{ $user->prenom }}">
                </td>
                <td>
                    <input class="input-{{$user->id}}" style="background:none;border:none;color:black;" disabled type="text" name="pseudo" value="{{ $user->pseudo }}">
                </td>
                <td>
                    <input class="input-{{$user->id}}" style="background:none;border:none;color:black;" disabled type="text" name="email" value="{{ $user->email }}">
                </td>
                <td>
                    <input class="input-{{$user->id}}" style="background:none;border:none;color:black;" disabled type="text" name="admin" value="{{ $user->admin }}">
                </td>
                <td>
                    <button type="button" data-target="{{$user->id}}" class="modify">Modifer</button>
                    <input style="display:none;" id="save-{{$user->id}}" type="submit" value="Sauvegarder">
                </td>
            </form>
                {{-- <a>
                    <form action='/admin/users/{{ $user->id }}' method="post">
                    @csrf
                    @method('delete')
                    <input type='submit' value='Supprimer'>
                    </form>
                </a>
            </td> --}}
>>>>>>> a8ac56f249bddf27cbcacc629f9af99dae49ff33:projet_2020/resources/views/administration/index.blade.php
        </tr> 
        @endforeach
        

>>>>>>> cfafae8dbc4cf7db16531a3a80d14a664bf35f30:projet_2020/resources/views/admin/index.blade.php
        </tbody>
    </table>

</div>


</div>

<script>
    const modifyBtnList = document.querySelectorAll('.modify');
    modifyBtnList.forEach(btn => {
        btn.addEventListener('click', () => {
            const idTarget = btn.dataset.target;
            const inputs = document.querySelectorAll(`.input-${idTarget}`);
            const saveBtn = document.querySelector(`#save-${idTarget}`)
            inputs.forEach(input => {
                input.style.border = "1px solid black";
                input.style.backgroundColor = "#f3f3f3";
                input.disabled = false;
            });
            btn.style.display = "none";
            saveBtn.style.display = "inherit";
        })
    })
</script>