<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CatBlog extends Model
{
    protected $table="cat_blog";

    public static function listaCat(){
        $listaFormador=DB::table('cat_blog')
       
        ->select('cat_blog.id','cat_blog.cat_nome','cat_blog.cat_descricao','cat_blog.cat_data')
        ->orderBy('id','desc')
         ->paginate(10);
        return $listaFormador;
    }
}
