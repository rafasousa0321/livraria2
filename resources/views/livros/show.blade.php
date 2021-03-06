@extends('layout')
<ul>
ID: {{$livro->id_livro}}<br>
Titulo: {{$livro->titulo}}<br>
Idioma: {{$livro->idioma}}<br>
ISBN: {{$livro->isbn}}<br>
Data Edição: {{$livro->data_edicao}}<br>
Total paginas: {{$livro->total_paginas}}<br>
Observações: {{$livro->observacoes}}<br>

@if($livro->imagem_capa != NULL)
    Imagem Capa: <br>
    <img src="{{asset('imagens/livros/' .$livro->imagem_capa)}}" width="150px"><br>
@else
    Imagem Capa: Inexistente<br>
@endif

@if(isset ($livro->user->name))
    Livro adicionado por: {{$livro->user->name}}<br>
@endif

@if(count($livro->editoras)>0)
        @foreach($livro->editoras as $editora)
        Editora:{{$editora->nome}}<br>
        @endforeach
    @else
        <div class="alert alert-danger" role="alert">
        Sem o nome do editora definido
        </div>
    @endif

    @if(isset ($livro->genero->designacao))
        Genero:{{$livro->genero->designacao}}<br>
    @else
        <div class="alert alert-danger" role="alert">
        Sem género definido
        </div>
    @endif
    
    @if(count($livro->autores)>0)
        @foreach($livro->autores as $autor)
            Autor:{{$autor->nome}}<br>
        @endforeach
    @else
        <div class="alert alert-danger" role="alert">
        Sem o nome do autor definido
        </div>
    @endif

    @if($livro->excerto != NULL)
        <a href="{{asset('documentos/livros/' .$livro->excerto)}}" Target="_blank">Excerto</a><br>
    @else
        Excerto: Inexistente<br>
    @endif

Sinopse:{{$livro->sinopse}}<br>
Created_at:{{$livro->created_at}}<br>
Updated_at:{{$livro->updated_at}}<br>
Deleted_at:{{$livro->deleted_at}}

<br>
<br>
@if($livro->id_user != NULL)
    @if(auth()->check())
        @if(auth()->user()->id == $livro->id_user)
            <a href="{{route('livros.edit' , ['id'=>$livro->id_livro])}}" class="btn btn-primary">Editar Livro</a>
            <a href="{{route('livros.delete' , ['id'=>$livro->id_livro])}}" class="btn btn-primary">Eliminar Livro</a>

        @endif
    @endif
@else
    <a href="{{route('livros.edit' , ['id'=>$livro->id_livro])}}" class="btn btn-primary">Editar Livro</a>
    <a href="{{route('livros.delete' , ['id'=>$livro->id_livro])}}" class="btn btn-primary">Eliminar Livro</a>   
@endif

@if(auth()->check())
    <form action="{{route('livros.comentario' , ['id'=>$livro->id_livro])}}">
        <br>
        Comentarios: <br><textarea type="text" name="comentario">{{old('comentario')}}</textarea><br>
        <input type="submit" text="enviar">
    </form>
@endif
</ul>