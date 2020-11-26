<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('titulo-pagina')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
</head>
<body>
    <h1 style="color: #00ff00;">@yield('header')</h1>
    @yield('conteudo')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="{{route('livros.index')}}">Livros</a>
      <a class="nav-item nav-link" href="{{route('generos.index')}}">Generos</a>
      <a class="nav-item nav-link" href="{{route('editoras.index')}}">Editoras</a>
      <a class="nav-item nav-link" href="{{route('autores.index')}}">Autores</a>
      <a class="nav-item nav-link"> | </a>
      <a class="nav-item nav-link" href="{{route('livros.create')}}">Novo Livro</a>
      <a class="nav-item nav-link" href="{{route('generos.create')}}">Novo Genero</a>
      <a class="nav-item nav-link" href="{{route('editoras.create')}}">Nova Editora</a>
      <a class="nav-item nav-link" href="{{route('autores.create')}}">Novo Autor</a>
    </div>
  </div>
</nav>
</body>
</html>