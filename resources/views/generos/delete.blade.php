<h3>Deseja mesmo eliminar o genero "{{$genero->designacao}}"?</h3>
<form action="{{route('generos.destroy', ['id'=>$genero->id_genero])}}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" value="{{$genero->id_genero}}">
    <input type="submit" value="Eliminar">
</form>