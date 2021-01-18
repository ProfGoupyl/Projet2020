@extends('layouts.default')

@section('content')
    @if(Auth::user())
    <user v-bind:user-infos="{{ Auth::user() }}"></user>
    @endif
@stop 