@extends('layouts.default')
@section('content')

<p>Test ajout fichier csv</p>
<p>Le formulaire d'ajout d'un fichier .csv devrait se faire dans la vue d'inscription des administrateurs.</p>

<form action="csv" method="post">
  @csrf
  <input type="file" name="myFile" value="ouvrir">
  <input type="submit" name="submit" value="Test lecture csv" title="Submit">
</form> 

@stop