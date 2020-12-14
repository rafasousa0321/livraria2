<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Genero;
use App\Models\Autor;
use App\Models\Editora;
use Auth;

class LivrosController extends Controller
{
    //
    public function index(){
        //$livros = Livro::all()->sortbydesc('idl');
        $livros= Livro::paginate(4);
        return view('livros.index',[
            'livros'=>$livros
        ]);
    }
    public function show(Request $request){
        $idLivro = $request->id;
        //$livro=Livro::findOrFail($idLivro);
        //$livro=Livro::find($idLivro);
        $livro=Livro::where('id_livro',$idLivro)->with(['genero','autores','editoras','user'])->first();
        return view('livros.show',[
            'livro'=>$livro
        ]);
    }

    public function create(){
        $generos=Genero::all();
        $editoras=Editora::all();
        $autores=Autor::all();
        return view ('livros.create', [
            'generos'=>$generos,
            'autores'=>$autores,
            'editoras'=>$editoras
        ]);
    }

    public function store(Request $req){

        $novoLivro = $req->validate([
            'titulo'=>['required', 'min:3', 'max:100'],
            'idioma'=>['required', 'min:3', 'max:10'],
            'total_paginas'=>['nullable', 'numeric', 'min:25'],
            'data_edicao'=>['nullable', 'date'],
            'isbn'=>['required', 'min:13', 'max:13'],
            'observacoes'=>['nullable', 'min:3', 'max:255'],
            'imagem_capa'=>['nullable', 'min:3', 'max:25'],
            'id_genero'=>['nullable', 'numeric'],
            'sinopse'=>['nullable', 'min:3', 'max:255'],
        ]);
        if(Auth::check()){
            $userAtual = Auth::user()->id;
            $novoLivro['id_user']=$userAtual;
        }
        $autores = $req->id_autor;
        $editoras = $req->id_editora;
        $livro = Livro::create($novoLivro);
        $livro->autores()->attach($autores);
        $livro->editoras()->attach($editoras);

        return redirect()->route('livros.show', [
            'id'=>$livro->id_livro
        ]);
    }

    public function edit(Request $req){
        $autores = Autor::all();
        $generos = Genero::all();
        $editoras = Editora::all();
        $idLivro = $req->id;
        $livro = Livro::where('id_livro', $idLivro)->with('autores', 'editoras','user')->first();
        $autoresLivro = [];
        $editorasLivro = [];
        foreach($livro->autores as $autor){
            $autoresLivro[] = $autor->id_autor;
        }
        foreach($livro->editoras as $editora){
            $editorasLivro[] = $editora->id_editora;
        }
        if(isset($livro->user->id_user)){
            if(Auth()->check()){
                if(Auth::user()->id == $livro->id_user){
                    return view('livros.edit',[
                        'livro'=>$livro,
                        'generos'=>$generos,
                        'autores'=>$autores,
                        'editoras'=>$editoras,
                        'autoresLivro'=>$autoresLivro,
                        'editorasLivro'=>$editorasLivro
                    ]);
                }else{
                    return view('index');
                }
            }
        }else{
            return view('livros.edit', [
                'livro'=>$livro,
                'generos'=>$generos,
                'autores'=>$autores,
                'editoras'=>$editoras,
                'autoresLivro'=>$autoresLivro,
                'editorasLivro'=>$editorasLivro
            ]);
        }
    }

    public function update(Request $req){
        $idLivro=$req->id;
        $livro = Livro::findOrFail($idLivro);
        $editarLivro = $req->validate([
            'titulo'=>['required', 'min:3', 'max:100'],
            'idioma'=>['required', 'min:3', 'max:10'],
            'total_paginas'=>['nullable', 'numeric', 'min:25'],
            'data_edicao'=>['nullable', 'date'],
            'isbn'=>['required', 'min:13', 'max:13'],
            'observacoes'=>['nullable', 'min:3', 'max:255'],
            'imagem_capa'=>['nullable', 'min:3', 'max:25'],
            'id_genero'=>['nullable', 'numeric'],
            'sinopse'=>['nullable', 'min:3', 'max:255'],
        ]);
        $autores = $req->id_autor;
        $editoras = $req->id_editora;
        $livro->update($editarLivro);
        $livro->autores()->sync($autores);
        $livro->editoras()->sync($editoras);

        return redirect()->route('livros.show', [
            'id'=>$livro->id_livro
        ]);
    }

    public function delete(Request $req){
        $livro = Livro::where('id_livro', $req->id)->first();
        if(isset($livro->users->id_user)){
            if(Auth()->check()){
                if(Auth::user()->id == $livro->id_user){
                    if(is_null($livro)){
                        return redirect()->route('livros.index')
                            ->with('msg', 'O livro não existe');
                    }else{
                        return view('livros.delete', ['livro'=>$livro]);
                    }
                }else{
                    return view('livros.index');
                }
            }
        }else{
            if(is_null($livro)){
                return redirect()->route('livros.index')
                    ->with('msg', 'O livro não existe');
            }else{
                return view('livros.delete', ['livro'=>$livro]);
            }
        }
    }

    public function destroy(Request $req){
        $livro = Livro::where('id_livro', $req->id)->first();
        $autoresLivro = Livro::findOrFail($req->id)->autores;
        $livro->autores()->detach($autoresLivro);
        if(is_null($livro)){
            return redirect()->route('livros.index')
                ->with('msg', 'O livro não existe');
        }else{
            $livro->delete();
            return redirect()->route('livros.index')->with('msg','Livro eliminado');
        }
    }

    public function comentario(Request $req){
        $idLivro = $req ->id;
        $livro = Livro::findOrFail($ilLivro);
        $comentario = $req->validate([
            'comentario'=>['required', 'min:1', 'max:255'],
        ]);
        if(Auth::check()){
            $userAtual = Auth::user()->id;
            $comentario['id_user']=$userAtual;
            return redirect()->route('livros.show',[
                'id' => $livro->id_livro
            ])
        }
    }
}
