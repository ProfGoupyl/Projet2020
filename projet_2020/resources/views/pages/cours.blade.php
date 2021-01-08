@extends('layouts.default')
@section('content')
    @if(Auth::user())
    <cours :userid='{{ Auth::user()->id }}'></cours>
    @endif
@stop