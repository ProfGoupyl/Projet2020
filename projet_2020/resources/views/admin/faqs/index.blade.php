@extends('layouts.default')
@section('content')
    <div class="faq">
        <div class="titre">
            <h2>FAQ Admin</h2>
        </div>
        <div class="button_new">
            <a class="fas fa-plus fa-lg" href="{{ route('faqs.create') }}" > Nouvel question</a>
        </div>
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
                    <form action="{{ route('faqs.destroy',$faq->id) }}" method="POST">
                        
                        <a class="fas fa-pen fa-lg" href="{{ route('faqs.edit',$faq->id) }}">modifier
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="fas fa-trash-alt fa-lg">supprimer</button>
                    </form>
                </p>
            </details>
            @endforeach
        </li>
    </div>    
@endsection