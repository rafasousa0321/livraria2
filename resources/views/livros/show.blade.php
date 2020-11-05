@extends('layout')
<ul>
ID:{{$livro->id_livro}}<br>
Titulo:{{$livro->titulo}}<br>
Idioma:{{$livro->idioma}}<br>
ISBN:{{$livro->isbn}}<br>
Total paginas:{{$livro->total_paginas}}<br>
Data Edição:{{$livro->data_edicao}}<br>
Observações:{{$livro->observacoes}}<br>
Imagem Capa:{{$livro->imagem_capa}}<br>
    @if(isset ($livro->genero->designacao))
        Genero:{{$livro->genero->designacao}}<br>
    @else
        <diV class="alert alert-danger" role="alert">
        Sem género definido
        </div>
    @endif
    
    @if(isset ($livro->autor->nome))
        Autor:{{$livro->autor->nome}}<br>
    @else
        <diV class="alert alert-danger" role="alert">
        Sem o nome do autor definido
        </div>
    @endif
Sinopse:{{$livro->sinopse}}<br>
Created_at:{{$livro->created_at}}<br>
Updated_at:{{$livro->updated_at}}<br>
Deleted_at:{{$livro->deleted_at}}
</ul>