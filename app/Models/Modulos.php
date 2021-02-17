<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Modulos extends Model
{
    protected $table = 'modulo';

    public static function listaModulo(){
   
        $listaMatriculas=DB::table('modulo')
        ->join('cursos','cursos.id','=','modulo.id_curso')
        ->select('modulo.id','modulo.modulo_titulo','modulo.modulo_descricao','modulo.modulo_status','cursos.curso_nome')
        ->orderBy('modulo.id','asc')
        ->paginate(10);
        return $listaMatriculas;
    }


    public static function listaModul($id){
   
        $listaMatriculas=DB::table('modulo')
        ->join('cursos','cursos.id','=','modulo.id_curso')
        ->select('modulo.id','modulo.modulo_titulo','modulo.modulo_descricao','modulo.modulo_status','cursos.curso_nome')
        ->where('cursos.id',$id)
        ->orderBy('modulo.id','asc')
        ->paginate(10);
        return $listaMatriculas;
    }

}
