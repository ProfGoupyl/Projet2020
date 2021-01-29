@extends('layouts.default')
@section('content')
<section>
    <h1>Liste des utilisateurs</h1>
    <p>Importez un <span id="csv-show" style="color:red;cursor:pointer;">.csv</span> pour créer des utilisateurs par lot. Ils recevront un email et un lien pour finaliser leur inscription.</p>
    <img style="display:none;" id="csv-img" src="{{asset('images/csv_model.jpg')}}" alt="">
    <form enctype="multipart/form-data" action="csv" method="post">
        @csrf
        <input required type="file" name="file" value="Choisir un fichier .csv" accept=".csv">
        <input type="submit" name="submit" value="Transférer" title="Submit">
    </form>
    <!-- Create New user -->
    <!-- Boutton ouvrant la modal et le formulaire d'ajout d'un cours -->
    <div>
        <button id="modal-open" class="add" type="button">
            <i class="fas fa-plus fa-lg"></i>
        </button>
    </div>
    <!-- Modal et formulaire d'ajout d'un cours -->
    <div id='modal' style="display:none;">
        <form action='/admin/users' method='POST'>
            @csrf
            <div>
                <label for="email">Email de l'utilisateur</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="name">Nom de l'utilisateur </label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="prenom">Prénom de l'utilisateur </label>
                <input type="text" name='prenom' id="prenom" required>
            </div>
            <div>
                <label for="prenom">Inviter l'étudiant à un cours (facultatif) </label>
                <select name="cours" id="cours">
                    <option value="null">-- Ne pas inviter à un cours --</option>
                    @foreach($cours as $c)
                    <option value="{{$c->id}}">{{$c->titre}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button id="ajouter" class="btn btn-primary" type="submit">
                    <i class="fas fa-plus fa-lg"></i>
                    Envoyer l'invitation
                </button>
            </div>
        </form>
    </div>
    <table class="listecours">
        <thead>
            <th>Nom</th>
            <th>prenom</th>
            <th>pseudo</th>
            <th>email</th>
            <th>admin</th>
            <th>action</th>
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
                        <!-- BUTTONS MODIFY & SAVE / START -->
                        <button id="modifier" class="btn btn-primary modify-btn" type="button" data-target="{{$user->id}}">
                            <i class="fas fa-pen fa-lg"></i>
                        </button>
                        <input type="submit" data-target="form-{{$user->id}}" class="save-btn" style="display:none;" id="save-{{$user->id}}" type="submit" />
                        <!-- BUTTONS MODIFY & SAVE / END -->

                        <!-- Formulaire de suppression -->
                        <div>
                            <button class="delete-btn" data-titre="{{$user->email}}" data-target="/admin/users/{{$user->id}}" value='Supprimer' class="btn btn-primary" type="button">
                                <i class="fas fa-trash-alt fa-lg"></i>
                            </button>
                        </div>

                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div id="delete-modal" style="position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:#333;display:none">
        <h2>Etes-vous sur de vouloir supprimer l'utilisateur: <span id="delete-title"></span> ?</h2>
        <form id="delete-form" action='' method="post">
            @csrf
            @method('delete')
            <div>
                <button id="delete" value='Supprimer' class="btn btn-primary" type="submit">
                    OUI
                </button>
                <button id="delete-close" type="button">NON</button>
            </div>
        </form>
    </div>
</section>
@stop
