<!-- @yield('content')  a rajouter a la fin du layout -->
@extends('admin.faqs.layout')
<!--navbar a changer -->

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>FAQ Admin</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('faqs.create') }}"> Nouvel question</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table>

    @foreach ($faqs as $faq)
    <tr>

        <td>{{ $faq->question }}</td>
    </tr>
    <tr>
        <td>{{ $faq->reponse }}</td>
        <td>
            <form action="{{ route('faqs.destroy',$faq->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('faqs.edit',$faq->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>


@endsection