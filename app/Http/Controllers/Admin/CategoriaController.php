<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoriaController extends Controller
{
    public function index()
    {
        
        $listaMigalhas=json_encode([
            ["titulo"=>"Home","url"=>route('admin')],
            ["titulo"=>"Categorias","url"=>route('categoria.index')]
        ]);
        $listaCat=Categorias::listaCat();
        return view('admin.categoria.index',compact('listaMigalhas','listaCat'));
    }

    public function store(Request $request)
    {
        $dados=new Categorias;
        $dados->cat_nome=$request->input('cat_nome');
        $dados->cat_descricao=$request->input('cat_descricao');
        $dados->cat_data=date('Y/m/d');
         //Cadastrar Categorias
     if($dados->save()){
         Session::flash('sms','A categoria foi inserido com sucesso');
        return redirect()->back();
    }

}

    public function show($id)
    {
        return Categorias::find($id);
    }

    
    public function update(Request $request, $id)
    {
        if(DB::table('categorias')          
        ->where('id','=',$id)
        ->update(['cat_nome'=>$request->cat_nome,'cat_descricao'=>$request->cat_descricao,'cat_data'=>date('Y/m/d')]))
    {
        Session::flash('sms','A categoria foi editada com sucesso');
        return redirect()->back();
    }      
    }

   
    public function destroy($id)
    {
        Categorias::find($id)->delete();
        Session::flash('sms','A categoria foi eliminada com sucesso');
        return redirect()->back();
    }


   
}
