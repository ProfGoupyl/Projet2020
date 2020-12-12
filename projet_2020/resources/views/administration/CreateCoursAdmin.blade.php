<!-- Gestion des module + Suppression des étudiants/cours à la fin de l'année scolaire  -->
@section('content')

<div class="container">
    <h1>Créer un Module</h1>
    <hr>
    <form action="{{ route('module.store') }}" metohd="POST">
    @csrf

    <div class="form-group">
    <label for="title">Titre du module</label>
    <input type="text" class="form-control" name="title" id="title">
    </div>
    <div class="form-group">
    <label for="content">Description</label>
    <input type="text" class="form-control" name="description" id="description">

    <!-- + Upload de video -->

    </div>
    </form>
</div>

@endsection
