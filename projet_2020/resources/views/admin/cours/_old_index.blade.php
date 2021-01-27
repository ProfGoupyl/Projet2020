@extends('layouts.default')
@section('content')
<section>
    <h1>Liste des cours</h1>
    <button id='modal-open'>Add</button>
    <div id='modal' style="display:none;">
        <i id="modal-close" class="fas fa-times"></i>
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
                <button id="ajouter" class="btn btn-primary" type="submit"><i class="fas fa-plus fa-lg"></i></button>
            </div>
        </form>
    </div>

    <table class="listecours">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Debut du cours</th>
                <th>Fin du cours</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cours_list as $cours)
            <tr>
                <form action='/admin/cours/{{ $cours->id }}' method='post'>
                    @csrf
                    @method('put')
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

                        <button id="modifier" class="btn btn-primary" type="submit" data-target="{{$cours->id}}"><i class="fas fa-pen fa-lg"></i></button>
                        <input class="save-btn" style="display:none;" id="save-{{$cours->id}}" type="submit" value="Sauvegarder">
                    </td>
                </form>
                <td>
                    <form action='/admin/cours/{{ $cours->id }}' method="post">
                        @csrf
                        @method('delete')
                        <div>
                            <button id="delete" value='Supprimer' class="btn btn-primary" type="submit"><i class="fas fa-trash-alt fa-lg"></i></button>
                        </div>
                    </form>
                    <a id="show" href='/admin/cours/{{$cours->id}}'>show</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>



</section>
@stop