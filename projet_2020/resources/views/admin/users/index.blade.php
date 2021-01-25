@extends('layouts.default')
@section('content')

<!-- Create New user -->
<button id="modal-open" class="btn btn-primary addUser">+ Ajouter un utilisateur</button>
<div id="modal" style="display:none">
    <i id="modal-close" class="fas fa-times"></i>
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

<!-- Reprend le tableau des utilisateur avec le CRUD + Suppression des étudiants/cours à la fin de l'année scolaire -->
<div id="showUser">

    <h1>Tableau des utilisateurs</h1>
    <form enctype="multipart/form-data" action="csv" method="post">
        @csrf
        <input required type="file" name="file" value="Choisir un fichier .csv" accept=".csv">
        <input type="submit" name="submit" value="Transférer" title="Submit">
    </form>

    <div class="col-12">
        <table class='listecours'>
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
                    <form class="userProfil" action="/admin/users/{{ $user->id }}" method="post">
                        @csrf
                        @method('put')
                        <td>
                            <input class="input-{{$user->id}} line-input" style="background:none;border:none;color:black;text-align:center;" disabled value={{$user->name}} type="text" name="name">
                        </td>
                        <td>
                            <input class="input-{{$user->id}} line-input" style="background:none;border:none;color:black;text-align:center;" disabled type="text" name="prenom" value="{{ $user->prenom }}">
                        </td>
                        <td>
                            <input class="input-{{$user->id}} line-input" style="background:none;border:none;color:black;text-align:center;" disabled type="text" name="pseudo" value="{{ $user->pseudo }}">
                        </td>
                        <td>
                            <input class="input-{{$user->id}} line-input" style="background:none;border:none;color:black;text-align:center;" disabled type="text" name="email" value="{{ $user->email }}">
                        </td>
                        <td>
                            <input class="input-{{$user->id}} line-input" style="background:none;border:none;color:black;text-align:center;" disabled type="text" name="admin" value="{{ $user->admin }}">
                        </td>
                        <td>
                            <button type="button" data-target="{{$user->id}}" id="modifier" class="modify-btn">Modifer</button>
                            <input class="save-btn" style="display:none;" id="save-{{$user->id}}" type="submit" value="Sauvegarder">
                        </td>
                    </form>

                    <td>
                        <form action='/admin/users/{{ $user->id }}' method="post">
                            @csrf
                            @method('delete')
                            <input type='submit' id="supprimer" value='Supprimer'>
                        </form>
                    </td>
                </tr>
                @endforeach



            </tbody>
        </table>

    </div>


</div>
@stop