@extends('layouts.default')
@section('content')



<h1>salut {{$cours->titre}}</h1>

<section>
    <div>
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
                <p>{{$m->titre}}</p>

                <a href="/admin/faqs/{{$m->id}}">Consulter la FAQ</a>
                <button data-action="{{$m->id}}" data-titre="{{$m->titre}}" data-desc="{{$m->description}}" data-url="{{$m->url_video}}" class="edit-module" id="modifier" type="button">Modifier</button>
                <form action="/admin/module/{{$m->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button id="delete" class="btn btn-primary" type="submit"><i class="fas fa-trash-alt fa-lg"></i></button>
                    <!-- <button id="supprimer"> Supprimer </button> -->
                </form>
            </div>

            @endforeach
        </div>
</section>

<form id="form-module" action="/admin/cours/{{$cours->id}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="general-data" value="true">
    <input type="hidden" name="cours" value="{{$cours->id}}">
    <input type="text" name="titre">
    <textarea name="description" cols="30" rows="10"></textarea>
    <input type="text" name="url_video">
    <input type="submit" value="Modifier">
</form>

<div id='addModule'>
    <form action='/admin/module' method='POST'>
        @csrf
        <input type="hidden" name="cours" value="{{$cours->id}}">
        <div>
            <label for="name">Entrer le titre </label>
            <input type="text" name="titre" id="name" required>
        </div>
        <div>
            <label>Description du module</label>
            <textarea name="description" cols="30" rows="10"></textarea>
        </div>


        <div>
            <input type="submit" id="ajouter" value="Ajouter!">
        </div>
    </form>

</div>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    const showBtns = document.querySelectorAll('.show_module');
    const formAll = document.querySelectorAll('.form-modules');
    showBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
            formAll.forEach((form) => {
                form.classList.remove('show')
            })
            const target = btn.dataset.target
            const form = document.querySelector(`#form-${target}`)
            form.classList.add('show')
        })
    })
</script>

<script>
   
</script> -->
@stop