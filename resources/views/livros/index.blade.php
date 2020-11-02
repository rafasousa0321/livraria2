<ul>
{{$livros->render()}}
@foreach($livros as $livro)
<li>
<a href="{{route('livros.show', ['id'=>$livro->idl])}}">
    {{$livro->titulo}}
</a>
</li>
@endforeach
</ul>
