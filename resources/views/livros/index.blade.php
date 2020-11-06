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

<form method="post" action="{{route('livros.form')}}">
    @csrf
<label for="nome">Nome</label>
<input type="text" name="nome">
<button type="submit">Enviar</button>
<br><br>
@endsection
