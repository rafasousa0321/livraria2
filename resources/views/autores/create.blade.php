<form action="{{route('autores.store')}}" method="post">
    @csrf
    
    <b>ID do Autor: (<b style="color:red">*</b>) </b><input type="text" name="id_autor" value="{{old('id_autor')}}"><br><br>
    @if ($errors-> has('id_autor'))
    <span style="color:red">O ID do autor tem de ser um número.</span><br><br>
    @endif<br>

    <b>Nome: (<b style="color:red">*</b>) </b><input type="text" name="nome" value="{{old('nome')}}"><br><br>
    @if ($errors-> has('nome'))
    <span style="color:red">O nome tem que ter entre 3 e 100 caracteres.</span><br><br>
    @endif<br>
    
    <b>Nacionalidade: </b><input type="text" name="nacionalidade" value="{{old('nacionalidade')}}"><br><br>
    @if ($errors-> has('nacionalidade'))
    <span style="color:red">A nacionalidade tem que ter entre 3 e 20 caracteres.</span><br><br>
    @endif<br>

    <b>Data de nascimento: </b><input type="date" name="data_nascimento" value="{{old('data_nascimento')}}"><br><br>
    @if ($errors-> has('data_nascimento'))
    <span style="color:red">O formato da data está incorreto (DD-MM-YYYY)</span><br><br>
    @endif<br>

    <b>Fotografia: </b><input type="text" name="fotografia" value="{{old('fotografia')}}"><br><br>
    @if ($errors-> has('fotografia'))
    <span style="color:red">A fotografia tem que ter entre 3 e 255 caracteres.</span><br><br>
    @endif<br>

    <input type="submit" value="Enviar">
</form>