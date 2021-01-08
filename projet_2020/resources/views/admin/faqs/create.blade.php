@extends('admin.faqs.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Nouvel question</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('faqs.index') }}"> Retour</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
    <strong> (╯°□°)╯︵ ┻━┻ Whoops! </strong> (　ﾟдﾟ) Probleme avec ton input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('faqs.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>question:</strong>
                <input type="text" name="question" class="form-control" placeholder="question">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>reponse:</strong>
                <textarea class="form-control" style="height:150px" name="reponse" placeholder="reponse"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection