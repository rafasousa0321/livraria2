<form action="{{route('editoras.store')}}" method="post">
    @csrf
    
    <b>ID da Editora: (<b style="color:red">*</b>) </b><input type="text" name="id_editora" value="{{old('id_editora')}}"><br><br>
    @if ($errors-> has('id_editora'))
    <span style="color:red">O ID da editora tem de ser um número (max. 11 caracteres.)</span><br><br>
    @endif<br>

    <b>Nome: (<b style="color:red">*</b>) </b><input type="text" name="nome" value="{{old('nome')}}"><br><br>
    @if ($errors-> has('nome'))
    <span style="color:red">O nome tem que ter entre 3 e 100 caracteres.</span><br><br>
    @endif<br>
    
    <b>Morada: </b><input type="text" name="morada" value="{{old('morada')}}"><br><br>
    @if ($errors-> has('morada'))
    <span style="color:red">A morada tem que ter entre 3 e 255 caracteres.</span><br><br>
    @endif<br>

    <b>Observações: </b><input type="text" name="observacoes" value="{{old('observacoes')}}"><br><br>
    @if ($errors-> has('observacoes'))
    <span style="color:red">As observações tem que ter entre 3 e 255 caracteres.</span><br><br>
    @endif<br>

    <input type="submit" value="Enviar">
</form>