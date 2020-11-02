<ul>
{{$autores->render()}}
@foreach($autores as $autor)
<li>
<a href="{{route('autores.show', ['ida'=>$autor->ida])}}">
    {{$autor->nome}}
</a></li>
@endforeach
</ul>