@extends('layouts.default')
@section('content')
@if(Auth::user())
<cours v-bind:user-infos="{{ Auth::user() }}"></cours>
@endif
@stop