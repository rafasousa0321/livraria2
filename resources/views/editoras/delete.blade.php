<h3>Deseja mesmo eliminar a editora "{{$editora->nome}}"?</h3>
<form action="{{route('editoras.destroy', ['id'=>$editora->id_editora])}}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" value="{{$editora->id_editora}}">
    <input type="submit" value="Eliminar">
</form>