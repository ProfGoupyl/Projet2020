@extends('layouts.default')
@section('content')

<form action="/admin/faqs/{{ $faq->id }}" method="post">
@csrf
@method('put')
<input type="text" name="question" value="{{ $faq->question }}">
<input type="text" name="reponse" value="{{ $faq->reponse }}">
<button id="ajouter" class="btn btn-primary" type="submit">
<i class="fas fa-plus fa-lg"></i></button>


</form>
@endsection