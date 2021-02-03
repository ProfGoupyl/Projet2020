@extends('layouts.default')
@section('content')
<section>
    <h1>Liste des cours de {{$user->name}}</h1>
    <table class="listecours">
        <thead>
            <tr>
                <th>Nom du cours</th>
                <th>Date de début</th>
                <th>Date de fin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user->cours as $c)
            <tr>
                <td><a class="Cours" id="cours id1">{{$c->titre}}</a></td>
                <td>
                    <p id="cours id1">{{$c->debut_du_cours}}</p>
                </td>
                <td>
                    <p id="cours id1">{{$c->fin_du_cours}}</p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@stop