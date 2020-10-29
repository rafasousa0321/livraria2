<ul>
{{$autores->render()}}
@foreach($autores as $autor)
<li>{{$autor->nome}}</li>
@endforeach
</ul>