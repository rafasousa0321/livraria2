<form action="{{route('generos.update', ['id'=>$genero->id_genero])}}" method="post">
    @csrf
    @method('patch')
    
    <b>ID do Genero: (<b style="color:red">*</b>) </b><input type="text" name="id_genero" value="{{$genero->id_genero}}"><br><br>
    @if ($errors-> has('id_genero'))
    <span style="color:red">O ID do genero tem de ser um número (max. 11 caracteres).</span><br><br>
    @endif<br>

    <b>Designação: (<b style="color:red">*</b>) </b><input type="text" name="designacao" value="{{$genero->designacao}}"><br><br>
    @if ($errors-> has('designacao'))
    <span style="color:red">A designação tem que ter entre 3 e 30 caracteres.</span><br><br>
    @endif<br>
    
    <b>Observações: </b><input type="text" name="observacoes" value="{{$genero->observacoes}}"><br><br>
    @if ($errors-> has('observacoes'))
    <span style="color:red">As observações tem que ter entre 3 e 255 caracteres.</span><br><br>
    @endif<br>

    <input type="submit" value="Enviar">
</form>