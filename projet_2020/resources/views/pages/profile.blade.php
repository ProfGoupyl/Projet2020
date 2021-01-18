@extends('layouts.default')

@section('content')
    @if(Auth::user())
    <modifyuser v-bind:user-infos="{{ Auth::user() }}"></modifyuser>
    @endif
@stop