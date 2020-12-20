@extends('layouts.default')

@section('content')
    @if(Auth::user())
    <session v-bind:userid='{{ Auth::user()->id }}'></session>
    @endif
@stop
