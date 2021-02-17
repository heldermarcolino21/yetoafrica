<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ServicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $listaServ=Servicos::listaServ();
        return view('admin.servicos.index',compact('listaServ'));
    
    }

    public function store(Request $request)
    {
        $dados=new Servicos;
        $dados->serv_nome=$request->input('serv_nome');
        $dados->serv_icone=$request->input('serv_icone');
        $dados->serv_descricao=$request->input('serv_descricao');
        $dados->serv_data=date('Y/m/d');
         //Cadastrar Categorias
     if($dados->save()){
         Session::flash('sms','Inserido com sucesso');
        return redirect()->back();
    }
    }

 public function show($id)
    {
        return Servicos::find($id);
    }

   
   
    public function update(Request $request, $id)
    {
        if(DB::table('servicos')          
        ->where('id','=',$id)
        ->update(['serv_nome'=>$request->serv_nome,'serv_descricao'=>$request->serv_descricao,'serv_data'=>date('Y/m/d'),'serv_icone'=>$request->serv_icone]))
    {
        Session::flash('sms','Editado com sucesso');
        return redirect()->back();
    }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Servicos::find($id)->delete();
        Session::flash('sms','Eliminado com sucesso');
        return redirect()->back();
    }
}
