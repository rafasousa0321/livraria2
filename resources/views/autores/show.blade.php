@extends('layout')
<ul>
IDA:{{$autores->id_autor}}<br>
Nome:{{$autores->nome}}<br>
    @if(count($autores->livros))
        @foreach($autores->livros as $livro)
            {{$livro->titulo}}<br>
        @endforeach
    @else  
        <div class="alert alert-danger" role="alert">
            Neste autor ainda não há livros!
        </div>
    @endif
Nacionalidade:{{$autores->nacionalidade}}<br>
Data de Nascimento:{{$autores->data_nascimento}}
Fotografia:{{$autores->fotografia}}<br>
Created_at:{{$autores->created_at}}<br>
Updated_at:{{$autores->updated_at}}<br>
Deleted_at:{{$autores->deleted_at}}
</ul>