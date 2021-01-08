<h1>salut {{$cours->titre}}</h1>
<section>
    @foreach($modules as $m)
    <p>{{$m->titre}}</p>
    @endforeach




</section>



