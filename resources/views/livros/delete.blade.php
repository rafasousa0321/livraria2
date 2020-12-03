<h3>Deseja mesmo eliminar o livro "{{$livro->titulo}}"?</h3>
<form action="{{route('livros.destroy', ['id'=>$livro->id_livro])}}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" value="{{$livro->id_livro}}">
    <input type="submit" value="Eliminar">
</form>