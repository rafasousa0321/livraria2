<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editora;
use Illuminate\Support\Facades\Gate;

class EditorasController extends Controller
{
    //
    public function index(){
        //$editoras = Editora::all()->sortbydesc('idl');
        $editoras= Editora::paginate(4);
        return view('editoras.index',[
            'editoras'=>$editoras
        ]);
    }
    public function show(Request $request){
        $idEditora = $request->ide;
        //$editora=Editora::findOrFail($idEditora);
        //$editora=Editora::find($idEditora);
        $editora=Editora::where('id_editora',$idEditora)->with('livros')->first();
        return view('editoras.show',[
            'editora'=>$editora
        ]);
    }

    public function create(){
        if(Gate::allows('admin')){
            return view('editoras.create');
        }else{
            return redirect()->route('editoras.index')
                ->with('msg', 'Não tem permissão para aceder à área pretendida.');
        }
    }

    public function store(Request $req){
        if(Gate::allows('admin')){
            $novaEditora = $req->validate([
                'id_editora'=>['required', 'min:3', 'max:11'],
                'nome'=>['required', 'min:3', 'max:100'],
                'morada'=>['nullable', 'min:3', 'max:255'],
                'observacoes'=>['nullable', 'min:3', 'max:255'],
            ]);
            $editora = Editora::create($novaEditora);

            return redirect()->route('editora.show', [
                'ide'=>$editora->id_editora
            ]);
        }else{
            return redirect()->route('editoras.index')
                ->with('msg', 'Não tem permissão para aceder à área pretendida.');
        }
    }

    public function edit(Request $req){
        if(Gate::allows('admin')){
            $idEditora = $req->ide;
            $editora = Editora::where('id_editora', $idEditora)->first();
            return view('editoras.edit', [
                'editora'=>$editora
            ]);
        }else{
            return redirect()->route('editoras.index')
                ->with('msg', 'Não tem permissão para aceder à área pretendida.');
        }
    }

    public function update(Request $req){
        if(Gate::allows('admin')){
            $idEditora=$req->ide;
            $editora = Editora::findOrFail($idEditora);
            $editarEditora = $req->validate([
                'id_editora'=>['required', 'min:3', 'max:11'],
                'nome'=>['required', 'min:3', 'max:100'],
                'morada'=>['nullable', 'min:3', 'max:255'],
                'observacoes'=>['nullable', 'min:3', 'max:255'],
            ]);
            $editora->update($editarEditora);
            return redirect()->route('editoras.show', [
                'ide'=>$editora->id_editora
            ]);
        }else{
            return redirect()->route('editoras.index')
                ->with('msg', 'Não tem permissão para aceder à área pretendida.');
        }
    }

    public function delete(Request $req){
        if(Gate::allows('admin')){
            $editora = Editora::where('id_editora', $req->id)->first();
            if(is_null($editora)){
                return redirect()->route('editoras.index')
                    ->with('msg', 'A editora não existe');
            }else{
                return view('editoras.delete', ['editora'=>$editora]);
            }
        }else{
            return redirect()->route('editoras.index')
                ->with('msg', 'Não tem permissão para aceder à área pretendida.');
        }
    }

    public function destroy(Request $req){
        $editora = Editora::where('id_editora', $req->id)->first();
        if(is_null($editora)){
            return redirect()->route('editoras.index')
                ->with('msg', 'A editora não existe');
        }else{
            $editora->delete();
            return redirect()->route('editoras.index')->with('msg', 'Editora eliminada');
        }

    }
}
