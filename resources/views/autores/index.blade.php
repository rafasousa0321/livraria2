@extends('layout')
<ul>
{{$autores->render()}}
@foreach($autores as $autor)
<li>
<a href="{{route('autores.show', ['ida'=>$autor->id_autor])}}">
    {{$autor->nome}}
</a></li>
@endforeach
</ul>