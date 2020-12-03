<h3>Deseja mesmo eliminar o autor "{{$autor->nome}}"?</h3>
<form action="{{route('autores.destroy', ['id'=>$autor->id_autor])}}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" value="{{$autor->id_autor}}">
    <input type="submit" value="Eliminar">
</form>