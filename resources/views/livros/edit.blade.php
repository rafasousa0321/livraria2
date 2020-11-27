<form action="{{route('livros.update', ['id'=>$livro->id_livro])}}" method="post">
    @csrf
    @method('patch')
    
    <b>Titulo: (<b style="color:red">*</b>) </b><input type="text" name="titulo" value="{{$livro->titulo}}"><br><br>
    @if ($errors-> has('titulo'))
    <span style="color:red">O titulo deve ter entre 3 e 100 caracteres.</span><br><br>
    @endif<br>

    <b>Idioma: (<b style="color:red">*</b>) </b><input type="text" name="idioma" value="{{$livro->idioma}}"><br><br>
    @if ($errors-> has('idioma'))
    <span style="color:red">O idioma deve ter entre 3 e 10 caracteres.</span><br><br>
    @endif<br>
    
    <b>Total páginas: </b><input type="text" name="total_paginas" value="{{$livro->total_paginas}}"><br><br>
    @if ($errors-> has('total_paginas'))
    <span style="color:red">O número de páginas não pode ser inferior a 1.</span><br><br>
    @endif<br>

    <b>Data Edição: </b><input type="date" name="data_edicao" value="{{$livro->data_edicao}}"><br><br>
    @if ($errors-> has('data_edicao'))
    <span style="color:red">Formato de data incorreto (DD-MM-YYYY)</span><br><br>
    @endif<br>
    
    <b>ISBN: (<b style="color:red">*</b>)</b> <input type="text" name="isbn" value="{{$livro->isbn}}"><br>
    @if ($errors-> has('isbn'))
    <span style="color:red">Deverá indicar um ISBN correto (13 caracteres).</span><br><br>
    @endif<br>

    <b>Observaões: </b><textarea name="observacoes">{{$livro->observacoes}}</textarea><br><br>
    @if ($errors-> has('observacoes'))
    <span style="color:red">As observações devem ter entre 3 e 255 caracteres.</span><br><br>
    @endif<br>

    <b>Imagem capa: </b><input type="text" name="imagem_capa" value="{{$livro->imagem_capa}}"><br><br>
    @if ($errors-> has('imagem_capa'))
    <span style="color:red">A imagem deve ter entre 3 e 25 caracteres.</span><br><br>
    @endif<br>

    <b>Género: </b><input type="text" name="genero" value="{{$livro->genero}}"><br><br>
    @if ($errors-> has('genero'))
    <span style="color:red">O ID do género tem de ser um número.</span><br><br>
    @endif<br>

    <b>Autor: </b><input type="text" name="autor" value="{{$livro->autor}}"><br><br>
    @if ($errors-> has('autor'))
    <span style="color:red">O ID do autor tem de ser um número.</span><br><br>
    @endif<br>

    <b>Sinopse: </b><textarea name="sinopse">{{$livro->sinopse}}</textarea><br><br>
    @if ($errors-> has('sinopse'))
    <span style="color:red">a sinopse tem que ter entre 3 e 255 caracteres.</span><br><br>
    @endif<br>

    <input type="submit" value="Enviar">
</form>