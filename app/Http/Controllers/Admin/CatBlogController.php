<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\CatBlog;


class CatBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $listaCatBlog=CatBlog::listaCat();
        return view('admin.cat_blog.index',compact('listaCatBlog'));
    }


    public function store(Request $request)
    {
        $dados=new CatBlog;
        $dados->cat_nome=$request->input('cat_nome');
        $dados->cat_descricao=$request->input('cat_descricao');
        $dados->cat_data=date('Y/m/d');
         //Cadastrar Categorias
     if($dados->save()){
         Session::flash('sms','Inserido com sucesso');
        return redirect()->back();
    }

    }


    public function show($id)
    {
        return CatBlog::find($id);
    }


    public function update(Request $request, $id)
    {
        if(DB::table('cat_blog')          
        ->where('id','=',$id)
        ->update(['cat_nome'=>$request->cat_nome,'cat_descricao'=>$request->cat_descricao,'cat_data'=>date('Y/m/d')]))
    {
        Session::flash('sms','Editado com sucesso');
        return redirect()->back();
    }   
    }

   
    public function destroy($id)
    {
        CatBlog::find($id)->delete();
        Session::flash('sms','Eliminado com sucesso');
        return redirect()->back();
    }
}
