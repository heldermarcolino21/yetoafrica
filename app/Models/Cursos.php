<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cursos extends Model
{
    protected $table="cursos";
    protected $fillable = ['id','curso_img','curso_preco','curso_img','curso_descricao','curso_data','curso_status','curso_duracao','curso_link'];
 
    //função para listar todos os cursos
    public static function listaCursos(){
   
        $listaFormador=DB::table('cursos')
        ->join('formador','formador.id','=','cursos.id_formador')
        ->join('categorias','categorias.id','=','cursos.id_categoria')
        ->join('users','users.id','=','formador.id_user')
        ->select('cursos.id','users.name','cursos.curso_nome','cursos.curso_duracao','cursos.curso_descricao','cursos.curso_img','cursos.curso_data','cursos.curso_preco','categorias.cat_nome','cursos.curso_status')
        ->orderBy('cursos.id','desc')
        ->paginate(10);
        return $listaFormador;
}
  
    
public static function listaCursoCat($id){
   
    $listaFormador=DB::table('cursos')
    ->join('formador','formador.id','=','cursos.id_formador')
    ->join('categorias','categorias.id','=','cursos.id_categoria')
    ->join('users','users.id','=','formador.id_user')
    ->select('cursos.id','users.name','cursos.curso_nome','cursos.curso_duracao','cursos.curso_descricao','cursos.curso_img','cursos.curso_data','cursos.curso_preco','categorias.cat_nome','cursos.curso_status')
    ->where('categorias.id',$id)
    ->orderBy('cursos.id','desc')
    ->paginate(10);
    return $listaFormador;
}


//listar todos os cursos com id do formador
public static function listaCursosForm($id){
   
    $listaFormador=DB::table('cursos')
    ->join('formador','formador.id','=','cursos.id_formador')
    ->join('categorias','categorias.id','=','cursos.id_categoria')
    ->join('users','users.id','=','formador.id_user')
    ->select('cursos.id','cursos.curso_nome','cursos.curso_duracao','cursos.curso_img','cursos.curso_data','cursos.curso_preco','cursos.curso_link','categorias.cat_nome')
    ->where('users.id',$id)
    ->orderBy('cursos.id','desc')
    ->paginate(10);
    return $listaFormador;
}

public static function listaCursosAl($id){
   
    $listaFormador=DB::table('cursos')
    ->join('pedidos_cursos','pedidos_cursos.curso_id','=','cursos.id')
    ->join('pedidos','pedidos.id','=','pedidos_cursos.pedido_id')
    ->join('users','users.id','=','pedidos.user_id')
    ->select('cursos.id','cursos.curso_nome')
    ->where('users.id',$id)
    ->where('pedidos_cursos.status','PA')
    ->orderBy('cursos.id','desc')
    ->paginate(10);
    return $listaFormador;
}



public static function listaCursosAcademia($id){
   
    $listaFormador=DB::table('cursos')
    ->join('formador','formador.id','=','cursos.id_formador')
    ->join('form_acad','form_acad.id_formador','=','cursos.id_formador')
    ->join('academia','academia.id','=','form_acad.id_academia')
    ->join('categorias','categorias.id','=','cursos.id_categoria')
    ->join('users','users.id','=','formador.id_user')
    ->select('cursos.id','cursos.curso_nome','cursos.curso_duracao','cursos.curso_img','cursos.curso_data','cursos.curso_preco','categorias.cat_nome')
    ->where('academia.id',$id)
    ->orderBy('cursos.id','desc')
    ->paginate(10);
    return $listaFormador;
}


public function searche($filter = null){

    $results=$this->where(function ($query) use ($filter){
        if($filter){
            $query->where('curso_nome','like',"%{$filter}%");
        }
    })->paginate(5);
   // dd($results);
return $results; 
}




//Area de nova de teste e implementação
//listar o ultimo curso com o id do formador
public static function listaCursoUltimo($id){

    $listaFormador=DB::table('cursos')
    ->join('formador','formador.id','=','cursos.id_formador')
    ->join('categorias','categorias.id','=','cursos.id_categoria')
    ->join('users','users.id','=','formador.id_user')
    ->select('cursos.id')
    ->where('users.id',$id)
    ->orderBy('cursos.id','desc')
    //->limit(1)
    ->paginate(10);
    return $listaFormador;
}






}
