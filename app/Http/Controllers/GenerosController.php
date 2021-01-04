<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;
use Illuminate\Support\Facades\Gate;

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
        if(Gate::allows('admin')){
            return view('generos.create');
        }else{
            return redirect()->route('generos.index')
                ->with('msg', 'Não tem permissão para aceder à área pretendida.');
        }
    }

    public function store(Request $req){
        if(Gate::allows('admin')){
            $novoGenero = $req->validate([
                'id_genero'=>['required', 'min:3', 'max:11'],
                'designacao'=>['required', 'min:3', 'max:30'],
                'observacoes'=>['nullable', 'min:25', 'max:255'],
            ]);
            $genero = Genero::create($novoGenero);

            return redirect()->route('generos.show', [
                'idg'=>$genero->id_genero
            ]);
        }else{
            return redirect()->route('generos.index')
                ->with('msg', 'Não tem permissão para aceder à área pretendida.');
        }
    }

    public function edit(Request $req){
        if(Gate::allows('admin')){
            $idGenero = $req->idg;
            $genero = Genero::where('id_genero', $idGenero)->first();
            return view('generos.edit', [
                'genero'=>$genero
            ]);
        }else{
            return redirect()->route('generos.index')
                ->with('msg', 'Não tem permissão para aceder à área pretendida.');
        }
    }

    public function update(Request $req){
        if(Gate::allows('admin')){
            $idGenero=$req->idg;
            $genero = Genero::findOrFail($idGenero);
            $editarGenero = $req->validate([
                'id_genero'=>['required', 'min:3', 'max:11'],
                'designacao'=>['required', 'min:3', 'max:30'],
                'observacoes'=>['nullable', 'min:25', 'max:255'],
            ]);
            $genero->update($editarGenero);
            return redirect()->route('generos.show', [
                'idg'=>$genero->id_genero
            ]);
        }else{
            return redirect()->route('generos.index')
                ->with('msg', 'Não tem permissão para aceder à área pretendida.');
        }
    }

    public function delete(Request $req){
        if(Gate::allows('admin')){
            $genero = Genero::where('id_genero', $req->id)->first();
            if(is_null($genero)){
                return redirect()->route('generos.index')
                    ->with('msg', 'O genero não existe');
            }else{
                return view('generos.delete', ['genero'=>$genero]);
            }
        }else{
            return redirect()->route('generos.index')
                ->with('msg', 'Não tem permissão para aceder à área pretendida.');
        }
    }

    public function destroy(Request $req){
        $genero = Genero::where('id_genero', $req->id)->first();
        if(is_null($genero)){
            return redirect()->route('generos.index')
                ->with('msg', 'O genero não existe');
        }else{
            $genero->delete();
            return redirect()->route('generos.index')->with('msg', 'Genero eliminado');
        }

    }
}
