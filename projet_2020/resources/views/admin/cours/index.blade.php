@extends('layouts.default')
@section('content')
<section>
    <h1>Liste des cours</h1>
    <!-- Boutton ouvrant la modal et le formulaire d'ajout d'un cours -->
    <div>
        <button id="modal-open" class="btn btn-primary" type="button">
            <i class="fas fa-plus fa-lg"></i>
        </button>
    </div>
    <!-- Modal et formulaire d'ajout d'un cours -->
    <div id='modal' style="display:none;">
        <form action='/admin/cours' method='POST'>
            @csrf
            <div>
                <label for="name">Entrer le titre </label>
                <input type="text" name="titre" id="name" required>
            </div>
            <div>
                <label>debut du cours: </label>
                <input type="date" name='debut_du_cours' required>
            </div>
            <div>
                <label>fin du cours: </label>
                <input type="date" name='fin_du_cours' required>
            </div>
            <div>
                <button id="ajouter" class="btn btn-primary" type="submit">
                    <i class="fas fa-plus fa-lg"></i>
                    Ajouter
                </button>
            </div>
        </form>
    </div>
    <!-- Liste des cours -->
    <table class="listecours">
        <thead>
            <tr>
                <th>Nom du cours</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cours_list as $cours)
            <tr>
                <form id="form-{{ $cours->id }}" action="/admin/cours/{{ $cours->id }}" method="post">
                    @csrf
                    @method("put")
                    <td>
                        <input class="input-{{$cours->id}} line-input" style="background:none;border:none;color:black;" disabled value="{{$cours->titre}}" type="text" name="titre">
                    </td>
                    <td>
                        <input class="input-{{$cours->id}} line-input" style="background:none;border:none;color:black;" disabled value="{{$cours->debut_du_cours }}" type="date" name="debut_du_cours">
                    </td>
                    <td>
                        <input class="input-{{$cours->id}} line-input" style="background:none;border:none;color:black;" disabled value="{{$cours->fin_du_cours}}" type="date" name="fin_du_cours">
                    </td>
                    <td>
                        <!-- BUTTONS MODIFY & SAVE / START -->
                        <button id="modifier" class="btn btn-primary modify-btn" type="button" data-target="{{$cours->id}}">
                            <i class="fas fa-pen fa-lg"></i>
                        </button>
                        <input type="submit" data-target="form-{{$cours->id}}" class="save-btn" style="display:none;" id="save-{{$cours->id}}" type="submit" />
                        <!-- BUTTONS MODIFY & SAVE / END -->

                        <!-- Formulaire de suppression -->
                        <div>
                            <button class="delete-btn" data-titre="{{$cours->titre}}" data-target="/admin/cours/{{$cours->id}}" value='Supprimer' class="btn btn-primary" type="button">
                                <i class="fas fa-trash-alt fa-lg"></i>
                            </button>
                        </div>
                        <!-- Lien vers la page show d'un cours -->
                        <a id="show" href='/admin/cours/{{$cours->id}}'>show</a>
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div id="delete-modal" style="position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:#333;display:none">
        <h2>Etes-vous sur de vouloir supprimer le cours: <span id="delete-title"></span> ?</h2>
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