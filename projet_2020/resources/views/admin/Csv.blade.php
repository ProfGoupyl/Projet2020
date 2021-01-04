@extends('layouts.default')
@section('content')

<p>Test ajout fichier csv</p>
<p>Le formulaire d'ajout d'un fichier .csv devrait se faire dans la vue d'inscription des administrateurs.</p>

<form enctype="multipart/form-data" action="csv" method="post">
  @csrf
  <input required type="file" name="file" value="Choisir un fichier .csv" accept=".csv">
  <input type="submit" name="submit" value="Transférer" title="Submit">
</form>

@stop
