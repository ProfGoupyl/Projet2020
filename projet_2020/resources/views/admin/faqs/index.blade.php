@extends('layouts.default')
@section('content')
<div class="faq">
        <div class="titre">
            <h2>FAQ Admin - {{$module->titre}} </h2>
        </div>
</div>
<div id='addFaqs'>
    <form action='/admin/faqs' method='POST'>
        @csrf

        <input type="hidden" name="modules" value="{{$id}}">

        <div>
            <label for="name">question</label>
            <input type="text" name="question" id="name" required>
        </div>
        <div>
            <label>Reponse</label>
            <textarea name="reponse" cols="30" rows="10"></textarea>
        </div>
        <div>
            <button id="ajouter" class="btn btn-primary" type="submit"><i class="fas fa-plus fa-lg"></i></button>
        </div>
    </form>

    <li>
        @foreach ($faqs as $faq)
        <details>
            <div class='faq_question'>
                <summary>{{ $faq->question }}</summary>
            </div>
            <p class='faq_question_hidden'>
                {{ $faq->reponse }}
            </p>
            <p>
            <form action='/admin/faqs/{{$faq->id}}' method='post'>
                @csrf
                @method('delete')
                <button id="delete" class="btn btn-primary" type="submit"><i
                            class="fas fa-trash-alt fa-lg"></i></button>
            </form>
            <button onclick="location.href='/admin/faqs/{{$faq->id}}/edit';"><i class="fas fa-pen fa-lg"></i></button>
            </p>
        </details>
        @endforeach
    </li>
</div>
@endsection