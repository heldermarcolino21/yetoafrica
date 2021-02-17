<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Matriculas extends Model
{
    protected $table="matricula";

    public static function listaMatricula(){
   
        $listaMatriculas=DB::table('matricula')
        ->join('cursos','cursos.id','=','matricula.id_curso')
        ->join('aluno','aluno.id','=','matricula.id_aluno')
        ->join('users','users.id','=','aluno.id_user')
        ->join('perfil','perfil.id_user','=','users.id')
        ->select('matricula.id','cursos.curso_nome','perfil.nome','matricula.data_inicio')
        ->orderBy('matricula.id','desc')
        ->paginate(10);
        return $listaMatriculas;
    }


    public static function listaCursosForm($id){
   
        $listaFormador=DB::table('cursos')
        ->join('formador','formador.id','=','cursos.id_formador')
        ->join('categorias','categorias.id','=','cursos.id_categoria')
        ->join('users','users.id','=','formador.id_user')
        ->join('perfil','perfil.id_user','=','users.id')
        ->select('cursos.id','cursos.curso_nome','cursos.curso_duracao','cursos.curso_img','cursos.curso_data','cursos.curso_preco','perfil.nome','categorias.cat_nome')
        ->where('users.id',$id)
        ->orderBy('cursos.id','desc')
        ->paginate(10);
        return $listaFormador;
    }
    


}
