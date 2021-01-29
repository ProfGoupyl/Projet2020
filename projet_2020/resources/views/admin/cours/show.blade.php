@extends('layouts.default')
@section('content')
<section>
    <aside>
        <!-- Formulaire réceptionnant les nouvelles valeurs "ordre" du module dragged et l'envoyant au ModuleController->update() -->
        <form id="myForm" action="" method="POST">
            @csrf
            @method('put')
            <input id="module_id" type="hidden" name="data[]" value="">
            <input id="module_order" type="hidden" name="data[]" value="">
            <input type="hidden" name="cours" value="{{$cours->id}}">
        </form>
        <nav class="navSecondaire drag-container">
            <ul>
                @foreach($modules as $m)
                <li data-neworder="" data-element="{{$m->id}}" data-order="{{$m->ordre}}" class="draggable" draggable="true" class="nomModule">
                    <input type="hidden" name="modules[]" value="{{$m->id}}-{{$m->ordre}}">
                    <a href="#">{{$m->titre}}</a>
                    <button id="modifier" class="btn btn-primary edit-module" type="submit" data-action="{{$m->id}}" data-titre="{{$m->titre}}" data-desc="{{$m->description}}" data-url="{{$m->url_video}}"><i class="fas fa-pen fa-lg"></i>Modifier</button>
                    <form action="/admin/module/{{$m->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button id="delete" class="btn btn-primary" type="submit">Supprimer</button>
                    </form>
                </li>
                @endforeach

                <br />
                <li class="addmodule">
                    <form action='/admin/module' method='POST'>
                        @csrf
                        <input type="text" placeholder="nom du module" name="titre" id="name" required />
                        <br />
                        <button id="ajouter" class="btn btn-primary" type="submit"><i class="fas fa-plus fa-lg"></i>Ajouter</button>
                    </form>
                </li>
            </ul>
        </nav>
    </aside>
    <div>


        <article>
            <form id="form-module" action="/admin/cours/{{$cours->id}}" method="POST">
                @csrf
                @method('put')
                <input type="hidden" name="general-data" value="true">
                <input type="hidden" name="cours" value="{{$cours->id}}">
                <input type="text" name="titre">
                <textarea name="description" cols="30" rows="10"></textarea>
                <input type="text" name="url_video">
                <button id="modifier" class="btn btn-primary" type="submit" value="modifier"><i class="fas fa-pen fa-lg"></i></button>
            </form>
        </article>
    </div>
</section>
@stop