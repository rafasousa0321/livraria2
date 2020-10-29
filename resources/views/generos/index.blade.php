<ul>
{{$generos->render()}}
@foreach($generos as $genero)
<li>{{$genero->designacao}}</li>
@endforeach
</ul>