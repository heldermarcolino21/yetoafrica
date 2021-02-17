<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categorias extends Model
{
    protected $table="categorias";

    public static function listaCat(){
        $listaFormador=DB::table('categorias')
        ->select('categorias.id','categorias.cat_nome','categorias.cat_descricao','categorias.cat_data')
        ->orderBy('id','desc')
         ->paginate(10);
        return $listaFormador;
    }
    
}
