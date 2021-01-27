@extends('layouts.default')
@section('content')
<div class="faq">
    <div class="titre_edit">
        <h2>Edit Faq</h2>
    </div>
    <div class="button_back">
        <a class="fas fa-plus fa-lg" href="{{ route('faqs.index') }}"> retour</a>
    </div>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong> (╯°□°)╯︵ ┻━┻ Whoops! </strong>Probleme avec ton input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="{{ route('faqs.update',$faq->id) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="question">question:</label>
            <input type="text" name="question" value="{{ $faq->question }}" id="question" class="form-control">
        </div>
        <div class="form-group">
            <label for="reponse">reponse:</label>
            <textarea class="form-control" style="height:150px" value="{{ $faq->reponse }}" id="reponse" name="reponse" ></textarea>
        </div>
        <button type="submit" class="fas fa-plus fa-lg">Submit</button>
    </form>
</div>
@endsection