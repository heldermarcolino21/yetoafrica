<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Sobre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SobreController extends Controller
{
    public function index()
    {
        $sobre=Sobre::all();
    
        return response()->json($sobre);

    }

    
    public function store(Request $request)
    {
        $img=$request->file('sobre_img');

        $dados=new Sobre;
       /*
        if($request->file('sobre_img')->isValid()){
           $img=$request->file('sobre_img')->store('sobre');
       }*/
        $dados->sobre_descricao=$request->sobre_descricao;
        $dados->sobre_titulo=$request->sobre_titulo;
        $dados->sobre_data=date('Y-m-d');
        $dados->sobre_img=$img;
     //inserir na tabela perfil 
     if($dados->save()){
        return response()->json(['success'=>'Inserido com sucesso']);
     };
    
    //Sobre::create($request->all());
  
    }


    public function show($id)
    {
        return Sobre::find($id);
    }

   
    public function update(Request $request, $id)
    {
      
        $img=$request->file('sobre_img');

      /*  
        if($request->file('sobre_img')->isValid()){
              $img=$request->file('sobre_img')->store('sobre');
       }
*/
        if(DB::table('sobre')          
            ->where('id','=',$id)
            ->update(['sobre_descricao'=>$request->sobre_descricao,'sobre_data'=>date('Y-m-d'),'sobre_img'=>$img]))
        {
            return response()->json(['success'=>'Actualizado com sucesso']);
        }      
    }

  
    public function destroy($id)
    {
        Sobre::find($id)->delete();
        return response()->json(['success'=>'Eliminado Com sucesso']);
    }


}
