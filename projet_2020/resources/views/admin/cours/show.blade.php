<style>
section.aside{
    color:red;
    width: 25%;
}

section.main{
    
    color:violet;
    width:70%;
    
}

div{
    display:flex;
    justify-content:space-between;
}


</style>



<h1>salut {{$cours->titre}}</h1>
<div>
<section class='aside'>
    @foreach($modules as $m)
    <p>{{$m->titre}}</p>
    @endforeach
</section>

<section class='main'>
    @foreach($modules as $m)
    <p>{{$m->titre}}</p>
    <p>{{$m->description}}</p>
    <p>{{$m->url_video}}</p>
    
    @endforeach

</section>


</div>




