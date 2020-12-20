@extends('layouts.default')

@section('content')
    @if(Auth::user())
    <modifyuser v-bind:userid='{{ Auth::user()->id }}'></modifyuser>
    @endif
@stop