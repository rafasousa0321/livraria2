<ul>
{{$editoras->render()}}
@foreach($editoras as $editora)
<li>{{$editora->nome}}</li>
@endforeach
</ul>