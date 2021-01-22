<!-- styles -->
<link rel="stylesheet" href="/css/default.css">

<form action="/admin/cours/{{$cours->id}}" method="POST">
    @csrf
    @method('put')
    @dump($cours)
    <input type="text" value="{{$cours->titre}}" name="titre">
    <input type="submit" value="GO">
</form>
