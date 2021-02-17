<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use App\Http\Requests\StoreUpdateSobreRequest;
use App\Models\Sobre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SobreController extends Controller
{

    
    public function index(Request $request)
    {
        $listaSobre=Sobre::listaSobre();
        return view('admin.sobre.index',compact('listaSobre'));

    }

    /*
    public function store(Request $request)
    {
       
        $dados=new Sobre;
        $img=$request->file('sobre_img');
        if($request->file('sobre_img')->isValid()){
              $img=$request->file('sobre_img')->store('sobre');
       }
        $dados->sobre_descricao=$request->input('sobre_descricao');
        $dados->sobre_titulo=$request->input('sobre_titulo');
        $dados->sobre_video=$request->input('sobre_video');
        $dados->sobre_data=date('Y-m-d');
        $dados->sobre_img=$img;
     //inserir na tabela perfil 
     if($dados->save()){
        Session::flash('sms','Inserido com sucesso');
        return redirect()->back();
        }
    }
*/

    public function show($id)
    {
        return Sobre::find($id);
    }

   
    public function update(Request $request, $id)
    {
      
        $img=$request->file('sobre_img');

     if($img!=null){   
        if($request->file('sobre_img')->isValid()){
              $img=$request->file('sobre_img')->store('sobre');

              if(DB::table('sobre')          
              ->where('id','=',$id)
              ->update(['sobre_descricao'=>$request->sobre_descricao,'sobre_data'=>date('Y-m-d'),'sobre_video'=>$request->sobre_video,'sobre_img'=>$img,'sobre_titulo'=>$request->sobre_titulo]))
          {
              Session::flash('sms','Actualizado com sucesso');
              return redirect()->back();
          }   
       }

    }

        if(DB::table('sobre')          
            ->where('id','=',$id)
            ->update(['sobre_descricao'=>$request->sobre_descricao,'sobre_data'=>date('Y-m-d'),'sobre_video'=>$request->sobre_video,'sobre_titulo'=>$request->sobre_titulo]))
        {
            Session::flash('sms','Actualizado com sucesso');
            return redirect()->back();
        }      
    }

  
    public function destroy($id)
    {
        Sobre::find($id)->delete();
        Session::flash('sms','Eliminado com sucesso');
        return redirect()->back();
    }



}
