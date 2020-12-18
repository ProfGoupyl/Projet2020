@extends('layouts.default')
@section('content')
    @if(Auth::user())
    <cours v-bind:userid='{{ Auth::user()->id }}'></cours>
    @endif
@stop