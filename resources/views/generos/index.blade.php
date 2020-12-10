@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')
<ul>
{{$generos->render()}}
@foreach($generos as $genero)
<li>
<a href="{{route('generos.show', ['idg'=>$genero->id_genero])}}">
    {{$genero->designacao}}
</a></li>
@endforeach
</ul>
<br>
@if(auth()->check())
    <a href="{{route('generos.create')}}" class="btn btn-primary">Novo Genero</a>
@endif
@endsection