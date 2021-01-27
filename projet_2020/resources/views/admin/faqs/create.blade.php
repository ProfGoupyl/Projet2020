@extends('layouts.default')
@section('content')
<div class="faq">
    <div class="titre">
        <h2>Nouvel question</h2>
    </div>
    <div class="button_back">
        <a class="fas fa-plus fa-lg" href="{{ route('faqs.index') }}"> Retour</a>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong> (╯°□°)╯︵ ┻━┻ Whoops! </strong>  Probleme avec ton input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('faqs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="question">question:</label>
            <input type="text" name="question" id="question" class="form-control" placeholder="question">
        </div>
        <div class="form-group">
            <label for="reponse">reponse:</label>
            <textarea class="form-control" style="height:150px" id="reponse" name="reponse" placeholder="reponse"></textarea>
        </div>
        <button type="submit" class="fas fa-plus fa-lg">Submit</button>
    </form>
</div>
@endsection