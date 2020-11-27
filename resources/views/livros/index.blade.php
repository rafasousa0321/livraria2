@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')
<ul>
{{$livros->render()}}
@foreach($livros as $livro)
<li>
<a href="{{route('livros.show', ['id'=>$livro->id_livro])}}">
    {{$livro->titulo}}
</a>
</li>
@endforeach
</ul>
<br>
<a href="{{route('livros.create')}}" class="btn btn-primary">Novo Livro</a>
@endsection