<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable=['id','user_id','blog_titulo','blog_foto','blog_descricao','blog_data'];

    public static function listaBlog(){
   
        $listaBlog=DB::table('blog')
        ->join('cat_blog','cat_blog.id','=','blog.categ_id')
        ->select('blog.id','blog.blog_foto','blog.blog_data','blog.blog_titulo','blog_descricao','cat_nome')
        ->orderBy('blog.id','desc')
        ->paginate(10);
        return $listaBlog;
    }

    public static function listaBlogcat($id){
   
        $listaBlog=DB::table('blog')
        ->join('cat_blog','cat_blog.id','=','blog.categ_id')
        ->select('blog.id','blog.blog_foto','blog.blog_data','blog.blog_titulo','blog_descricao','cat_nome')
        ->orderBy('blog.id','desc')
        ->where('cat_blog.id',$id)
        ->paginate(10);
        return $listaBlog;
    }

    public function comentarios(){
        return $this->hasMany(Comentablog::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function searche($filter = null){

        $results=$this->where(function ($query) use ($filter){
            if($filter){
                $query->where('blog_titulo','like',"%{$filter}%");
            }
        })->paginate(5);
       // dd($results);
    return $results; 
    }
}
