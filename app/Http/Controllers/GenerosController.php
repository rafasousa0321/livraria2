<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

class GenerosController extends Controller
{
    //
    public function index(){
        //$generos = Genero::all()->sortbydesc('idl');
        $generos= Genero::paginate(4);
        return view('generos.index',[
            'generos'=>$generos
        ]);
    }
    public function show(Request $request){
        $idgenero = $request->idg;
        //$genero=Genero::findOrFail($idgenero);
        //$genero=Genero::find($idgenero);
        $genero=Genero::where('id_genero',$idgenero)->with('livros')->first();
        return view('generos.show',[
            'genero'=>$genero
        ]);
    }

    public function create(){
        return view('generos.create');
    }

    public function store(Request $req){
        $novoGenero = $req->validate([
            'id_genero'=>['required', 'min:3', 'max:11'],
            'designacao'=>['required', 'min:3', 'max:30'],
            'observacoes'=>['nullable', 'min:25', 'max:255'],
        ]);
        $genero = Genero::create($novoGenero);

        return redirect()->route('generos.show', [
            'idg'=>$genero->id_genero
        ]);
    }
}
