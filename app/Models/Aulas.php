<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aulas extends Model
{
    protected $table = 'aulas';

    public static function listaAula(){
   
        $listaBlog=DB::table('aulas')
        ->join('modulo','modulo.id','=','aulas.modulo_id')
        ->select('aulas.id','aulas.aula_titulo','aulas.aula_duracao','modulo.modulo_titulo')
        ->orderBy('aulas.id','desc')
         ->paginate(10);
        return $listaBlog;
    }

   //Método que lista as aulas associado a um único módulo
    public static function listaAulaModulo($id){
   
        $listaBlog=DB::table('aulas')
        ->join('modulo','modulo.id','=','aulas.modulo_id')
        ->select('aulas.id','aulas.aula_titulo','aulas.aula_duracao','modulo.modulo_titulo')
        ->where('modulo.id',$id)
         ->paginate(10);
        return $listaBlog;
    }


    //Método que lista as aulas associado a um único módulo
    public static function listaCurso($id){
   
        $listaBlog=DB::table('cursos')
        ->join('modulo','modulo.id_curso','=','cursos.id')
        ->join('aulas','aulas.modulo_id','=','modulo.id')
        ->select('cursos.id','curso_nome','modulo_titulo','aula_titulo')
        ->where('aulas.id',$id)
         ->paginate(10);
        return $listaBlog;
    }

     //Método que lista as aulas associado a um curso
     public static function listaAulaCurso($id){
   
        $listaBlog=DB::table('aulas')
        ->join('modulo','modulo.id','=','aulas.modulo_id')
        ->join('cursos','cursos.id','=','modulo.id_curso')
        ->select('aulas.id','aulas.aula_titulo','aulas.aula_duracao','modulo.modulo_titulo','aulas.modulo_id')
        ->where('cursos.id',$id)
         ->paginate(10);
        return $listaBlog;
    }
    

    
}
