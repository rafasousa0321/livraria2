<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

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
        $livro=Livro::where('id_livro',$idLivro)->with(['genero','autores','editoras'])->first();
        return view('livros.show',[
            'livro'=>$livro
        ]);
    }

    public function create(){
        return view('livros.create');
    }

    public function store(Request $req){
        //$novoLivro = $req -> all();
        //dd($novoLivro);
        $novoLivro = $req->validate([
            'titulo'=>['required', 'min:3', 'max:100'],
            'idioma'=>['required', 'min:3', 'max:10'],
            'total_paginas'=>['nullable', 'numeric', 'min:25'],
            'data_edicao'=>['nullable', 'date'],
            'ibsn'=>['required', 'min:13', 'max:13'],
            'observacoes'=>['nullable', 'min:3', 'max:255'],
            'imagem_capa'=>['nullable', 'min:3', 'max:25'],
            'id_genero'=>['nullable', 'numeric'],
            'id_autor'=>['nullable', 'numeric'],
            'sinopse'=>['nullable', 'min:3', 'max:255'],
        ]);
        $livro = Livro::create($novoLivro);
    }
}
