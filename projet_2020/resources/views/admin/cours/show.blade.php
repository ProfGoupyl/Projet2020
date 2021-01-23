@extends('layouts.default')
@section('content')


<!-- styles -->
<link rel="stylesheet" href="/css/default.css">

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
                <button data-action="{{$m->id}}" data-titre="{{$m->titre}}" data-desc="{{$m->description}}" data-url="{{$m->url_video}}" class="edit-module" id="modifier" type="button">Modifier</button>
                <form action="/admin/module/{{$m->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button id="supprimer"> Supprimer </button>
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
            <label>Url du module</label>
            <input type="text" name='url_video' required>
        </div>

        <div>
            <input type="submit" id="ajouter" value="Ajouter!">
        </div>
    </form>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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





    const draggables = document.querySelectorAll('.draggable');
    const container = document.querySelector('.drag-container');

    // Script de fonctionnement du "drag&drop" (attraper et lacher):
    draggables.forEach(draggable => {
        // on drag l'élément
        draggable.addEventListener('dragstart', () => {
            draggable.classList.add('dragging')
        })
        // on lache l'élément et on modifie la valeur des inputs + envoit du formulaire
        draggable.addEventListener('dragend', () => {
            draggable.classList.remove('dragging');
            document.querySelector('#module_id').value = draggable.dataset.element
            document.querySelector('#module_order').value = draggable.dataset.neworder
            const form = document.querySelector('#myForm')
            form.action = `/admin/module/${draggable.dataset.element}`;
            form.submit();

        })
        // quand on survole la zone des modules, on vérifie ou se trouve notre souris par rapport à chaque module pour ensuite changer savoir quelle sera la nouvelle position du module dragged
        container.addEventListener('dragover', (e) => {
            e.preventDefault();
            const afterElement = getDragAfterElement(container, e.clientY);
            const draggable = document.querySelector('.dragging');
            let position = draggable.dataset.order;
            if (afterElement == null) {
                container.appendChild(draggable);
                position = draggables[draggables.length - 1].dataset.order;
            } else {
                container.insertBefore(draggable, afterElement);
                if (position > afterElement.dataset.order) {
                    position = afterElement.dataset.order
                } else {
                    position = afterElement.dataset.order - 1
                }
            }
            draggable.dataset.neworder = position;
        })
    })

    // Détécte par rapport à la position de la souris qui est l'élément qui vient just après
    function getDragAfterElement(container, y) {
        const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')];
        return draggableElements.reduce((closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;
            if (offset < 0 && offset > closest.offset) {
                return {
                    offset: offset,
                    element: child
                }
            } else {
                return closest;
            }
        }, {
            offset: Number.NEGATIVE_INFINITY
        }).element
    }
</script>

<script>
    const editBtns = document.querySelectorAll('.edit-module')
    const titre = document.querySelector('input[name=titre]')
    const desc = document.querySelector('textarea[name=description]')
    const url = document.querySelector('input[name=url_video]')
    const form = document.querySelector('#form-module')
    editBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            titre.value = btn.dataset.titre;
            desc.value = btn.dataset.desc;
            url.value = btn.dataset.url;
            form.action = `/admin/module/${btn.dataset.action}`
        })
    })
</script>
@stop