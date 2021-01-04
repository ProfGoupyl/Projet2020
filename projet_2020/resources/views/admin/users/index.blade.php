<!-- Reprend le tableau des utilisateur avec le CRUD + Suppression des étudiants/cours à la fin de l'année scolaire -->
<!-- Creat New user -->
<button class="btn btn-primary addUser">+ Ajouter un utilisateur</button>

<style>
#addUser{
    display:none;
}
#addUser.is-visible{
    display:block;
}
</style>
{{-- <div id="addUser">
=======
<div id="addUser">
>>>>>>> 3f42413e8c5cd5fd3ca8d176f7c916569aa79de3:projet_2020/resources/views/admin/index.blade.php
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />


            <form method="POST" action="http://localhost:8000/api/users">

            <form method="post" action="/users">

                @csrf
                <input type="hidden" value="sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9" name="api_token">

                <!-- Name -->
                <div>
                    <x-label for="name" type="text" :value="_('Nom')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"  required autofocus />
                </div>

                <!-- Prénom -->
                <div class="mt-4">
                    <x-label for="prenom" :value="__('Prénom')" />


                    <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
                </div>
=======
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
</div> --}}

<div id="addUser">
    <form action="/admin/users" method="POST">
    @csrf
        <label for="email">Email de l'utilisateur</label>
        <input id="email" type="email" name="email">

        <label for="name">Nom de l'utilisateur</label>
        <input id="name" type="name" name="name">

        <label for="prenom">Prénom de l'utilisateur</label>
        <input id="prenom" type="prenom" name="prenom">

        <input type="submit" value="Envoyer l'invitation">
    </form>
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

        @foreach ($users as $user)

        <tr>
            <form action="/admin/users/{{ $user->id }}" method="post">
                @csrf
                @method('put')
                <td>
                    <input class="input-{{$user->id}}" style="background:none;border:none;color:black;text-align:center;" disabled value={{$user->name}} type="text" name="name">
                </td>
                <td>
                    <input class="input-{{$user->id}}" style="background:none;border:none;color:black;text-align:center;" disabled type="text" name="prenom" value="{{ $user->prenom }}">
                </td>
                <td>
                    <input class="input-{{$user->id}}" style="background:none;border:none;color:black;text-align:center;" disabled type="text" name="pseudo" value="{{ $user->pseudo }}">
                </td>
                <td>
                    <input class="input-{{$user->id}}" style="background:none;border:none;color:black;text-align:center;" disabled type="text" name="email" value="{{ $user->email }}">
                </td>
                <td>
                    <input class="input-{{$user->id}}" style="background:none;border:none;color:black;text-align:center;" disabled type="text" name="admin" value="{{ $user->admin }}">
                </td>
                <td>
                    <button type="button" data-target="{{$user->id}}" class="modify">Modifer</button>
                    <input style="display:none;" id="save-{{$user->id}}" type="submit" value="Sauvegarder">
                </td>
                </form>

                <td>
                    <form action='/admin/users/{{ $user->id }}' method="post">
                    @csrf
                    @method('delete')
                    <input type='submit' value='Supprimer'>
                    </form>
                </td>
            
            </td> 
        </tr> 
        @endforeach



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
<script>

    // Ajouter un utilisateur
    const btnAddUser = document.querySelector('.addUser');
    const addUser = document.querySelector('#addUser');

    btnAddUser.addEventListener('click', () => {
        addUser.classList.toggle('is-visible');
    })
</script>

</script>
<style>
#addUser{
    display:none;
}
#addUser.is-visible{
    display:block;
}
</style>
