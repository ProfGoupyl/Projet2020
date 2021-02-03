@extends('layouts.default')
@section('content')

<h1 class="coursName_titre">{{$cours->titre}}</h1>
<button id="open-modal-user" class="btn btn-primary">
    <i class="fas fa-eye  fa-lg"></i> Consulter la liste des étudiants
</button>
<div style="position:fixed;top:50%;left:50%;z-index:-500;transform:translate(-50%,-50%);background:#f5f5f5;padding:25px;border:2px solid #333" id="user-modal">
    <h2>Liste des utilisateurs pour le cours {{$cours->titre}}</h2>
    <ul>
        @foreach($cours->users as $u)
        <li>
        <input type="checkbox" id='users-{{$u->id}}'>
            <label htmlFor='users-{{$u->id}}'>{{$u->email}}</label>
        </li>
        @endforeach
    </ul>
</div>

<section class="section_page_cours">

    <aside class="aside_page_cours">

        <!-- Formulaire réceptionnant les nouvelles valeurs "ordre" du module dragged et l'envoyant au ModuleController->update() -->
        <form id="myForm" action="" method="POST">
            @csrf
            @method('put')
            <input id="module_id" type="hidden" name="data[]" value="">
            <input id="module_order" type="hidden" name="data[]" value="">
            <input type="hidden" name="cours" value="{{$cours->id}}">
        </form>

        <!-- AFFICHAGE DES MODULES DU COURS + GESTION DE L ORDRE -->
        <div class="drag-container">

            @foreach($modules as $m)
            <div data-neworder="" data-element="{{$m->id}}" data-order="{{$m->ordre}}" class="draggable" draggable="true">
                <input type="hidden" name="modules[]" value="{{$m->id}}-{{$m->ordre}}">
                <p>{{$m->titre}}</p><a href="/admin/faqs/{{$m->id}}">Consulter la FAQ</a>
                <button id="modifier" class="btn btn-primary edit-module" type="submit" data-action="{{$m->id}}" data-titre="{{$m->titre}}" data-desc="{{$m->description}}" data-url="{{$m->url_video}}"><i class="fas fa-pen fa-lg"></i></button>
                <form action="/admin/module/{{$m->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button id="delete" class="btn btn-primary" type="submit"><i class="fas fa-trash-alt fa-lg"></i></button>
                </form>
            </div>
            @endforeach

        </div>

        <div>
            <article id='addModule'>

                <form action='/admin/module' method='POST'>
                    @csrf
                    <input type="hidden" name="cours" value="{{$cours->id}}">
                    <div>
                        <label for="name">Entrer le titre</label>
                        <input type="text" name="titre" id="name" required>
                    </div>
                    <div>
                        <label>Description du module</label>
                        <textarea name="description" cols="25" rows="1"></textarea>
                    </div>
                    <div>
                        <input type="text" name="url_video">
                    </div>
                    <div>
                        <button id="ajouter" class="btn btn-primary" type="submit"><i class="fas fa-plus fa-lg"></i></button>
                    </div>
                </form>

            </article>
        </div>
    </aside>

    <article>
        <div class="session">

            <article class="module">
                <form id="form-module" action="/admin/cours/{{$cours->id}}" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" name="general-data" value="true">
                    <input type="hidden" name="cours" value="{{$cours->id}}">
                    <input id="edit-titre" type="text" name="titre">
                    <textarea id="edit-desc" name="description" cols="30" rows="10"></textarea>
                    <input id="edit-video" type="text" name="url_video">
                    <button id="modifier" class="btn btn-primary" type="submit" value="modifier"><i class="fas fa-pen fa-lg"></i></button>
                </form>
            </article>

        </div>
    </article>
</section>

@stop