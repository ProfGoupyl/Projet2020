@extends('layouts.default')

@section('content')
    @if(Auth::user())
    <modifyuser v-bind:user='{{ Auth::user() }}'></modifyuser>
    @endif
@stop