<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $primaryKey="idl_livro";
    protected $table="livros";     
    public function genero(){
        return $this->belongsTo('App\Models\Genero','id_genero');
    }
    public function autor(){
        return $this->belongsTo('App\Models\Autor','id_autor');
    }
}
