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
            <h1>Cours</h1>
            <div class="Module1">
                <!-- S'affiche lorsque l'on clique sur "Module 1"  -->
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus
                    quas dicta odit sapiente impedit, aliquid ducimus accusamus
                    accusantium repellendus distinctio sint voluptatem minus sequi. Nemo
                    suscipit nulla mollitia aliquam laborum?
                </p>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero quod, culpa provident architecto
                    cum, quo eos itaque vel praesentium aspernatur distinctio, blanditiis voluptate debitis ipsa
                    suscipit nostrum aliquam earum delectus!
                </p>
                <!-- Avec éventuellement des ajouts de videos -->
                <iframe width="560" height="315" src="https://www.youtube.com/embed/u5Ho1trvlro" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </article>
        <article class="commentaires">
            <h1>Commentaire</h1>

            <ul>
                <li class="UserElements" id="CommentaireId1">
                    <h3>OuinOuin!!! (sujet)</h3>
                    <a href="../user_profil/user_profil.html" class="UserName">
                        <img class="UserImage" src="" alt="" width="50px" height="50px" />
                        User Name
                    </a>
                    <p>
                        C'est scandaleux, on m'a encore volé mes crayons de couleurs et mes
                        sandwichs à la cantine. Et à la compta, André m'a mis la main aux fesses
                        et blablabla pas content! g,eug,eugneu etc.. et dans quel monde on vis!
                        Et le bio c'ests bien, et la peine de mort c'est mal et la faim dans le
                        monde c'est la faute aux illuminatis gouvernés par les reptiliens et
                        rbqebedbmescouilles. Tenez le vous pour dit!
                    </p>
                    <button id="delete" class="btn btn-primary" type="submit">Supprimer</button>
                </li>

                <br />

                <li class="UserElements" id="CommentaireId2">
                    <h3>sujet</h3>
                    <a href="../user_profil/user_profil.html" class="UserName">
                        <img class="UserImage" src="" alt="" width="50px" height="50px" />
                        User Name
                    </a>
                    <p>
                        C'est scandaleux, on m'a encore volé mes crayons de couleurs et mes
                        sandwichs à la cantine. Et à la compta, André m'a mis la main aux fesses
                        et blablabla pas content! g,eug,eugneu etc.. et dans quel monde on vis!
                        Et le bio c'ests bien, et la peine de mort c'est mal et la faim dans le
                        monde c'est la faute aux illuminatis gouvernés par les reptiliens et
                        rbqebedbmescouilles. Tenez le vous pour dit!
                    </p>
                    <button id="delete" class="btn btn-primary" type="submit">Supprimer</button>
                </li>
            </ul>


            <br /><br />
            <form>
                <label for="sujet"> Sujet : </label>
                <input type="text" placeholder="Sujet" required />

                <br />

                <label for="commentaire"> Commentaire : </label>
                <textarea name="Commentaire" required></textarea>

                <br />

                <button id="ajouter" class="btn btn-primary" type="submit">Ajouter</button>
            </form>
        </article>
    </div>
</section>
@stop