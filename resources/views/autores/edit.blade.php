<form action="{{route('autores.update' , ['id'=>$autor->id_autor])}}" method="post">
    @csrf
    @method('patch')
    
    <b>ID do Autor: (<b style="color:red">*</b>) </b><input type="text" name="id_autor" value="{{$autor->id_autor}}"><br><br>
    @if ($errors-> has('id_autor'))
    <span style="color:red">O ID do autor tem de ser um número.</span><br><br>
    @endif<br>

    <b>Nome: (<b style="color:red">*</b>) </b><input type="text" name="nome" value="{{$autor->nome}}"><br><br>
    @if ($errors-> has('nome'))
    <span style="color:red">O nome tem que ter entre 3 e 100 caracteres.</span><br><br>
    @endif<br>
    
    <b>Nacionalidade: </b><input type="text" name="nacionalidade" value="{{$autor->nacionalidade}}"><br><br>
    @if ($errors-> has('nacionalidade'))
    <span style="color:red">A nacionalidade tem que ter entre 3 e 20 caracteres.</span><br><br>
    @endif<br>

    <b>Data de nascimento: </b><input type="date" name="data_nascimento" value="{{$autor->data_nascimento}}"><br><br>
    @if ($errors-> has('data_nascimento'))
    <span style="color:red">O formato da data está incorreto (DD-MM-YYYY)</span><br><br>
    @endif<br>

    <b>Fotografia: </b><input type="file" name="fotografia" value="{{old('fotografia')}}"><br><br>
    @if ($errors-> has('fotografia'))
    <span style="color:red">A fotografia tem que ter no máximo 2mb.</span><br><br>
    @endif<br>

    <input type="submit" value="Enviar">
</form>