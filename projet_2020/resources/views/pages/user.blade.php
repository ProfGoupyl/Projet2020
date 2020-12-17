@extends('layouts.default')

@section('content')
    @if(Auth::user())
    <user v-bind:userid='{{ Auth::user()->id }}'></user>
    @endif
@stop 