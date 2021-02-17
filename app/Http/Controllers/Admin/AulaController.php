<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aulas;
use App\Models\Modulos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AulaController extends Controller
{
    public function index()
    {
        $listaMigalhas=json_encode([
            ["titulo"=>"Home","url"=>route('admin')],
            ["titulo"=>"Aula","url"=>route('aula.index')]
        ]);
        $listaAula=Aulas::listaAula();
        $listaModulos=Modulos::listaModulo();
      
        return view('admin.aula.index',compact('listaMigalhas','listaAula','listaModulos'));
    }

    public function store(Request $request)
    {
        $dados=new Aulas;
        $dados->aula_titulo=$request->input('aula_titulo');
        $dados->aula_descricao=$request->input('aula_descricao');
        $dados->aula_duracao=$request->input('aula_duracao');
        $dados->aula_link=$request->input('aula_link');
        $dados->aula_status=false;
        $dados->modulo_id=$request->input('modulo_id');

        $img=$request->file('aula_conteudo');
        if($request->file('aula_conteudo')!=null){
        $img=$request->file('aula_conteudo')->store('aula_conteudo');
        }
        else
        {
            $img = null;
        }
        

        $dados->aula_conteudo=$img;
       
     //inserir aula no modulo
     if($dados->save()){
        Session::flash('sms','A aula foi inserida com sucesso');
        return redirect()->back();
        }
    } 


 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Aulas::find($id);
    }

    public function update(Request $request, $id)
    {
       
        $img=$request->file('aula_conteudo');
    
     if($img!=null){
      if($request->file('aula_conteudo')->isValid()){
$img=$request->file('aula_conteudo')->store('aula_conteudo');}

        if(DB::table('aulas')          
        ->where('id','=',$id)
        ->update(['aula_titulo'=>$request->aula_titulo,'aula_descricao'=>$request->aula_descricao,'aula_duracao'=>$request->aula_duracao,'aula_link'=>$request->aula_link,'aula_conteudo'=>$img]))
    {
        Session::flash('sms','Actualizada com sucesso');
        return redirect()->back();
    }  
    
}else{
   // dd($request);
    if(DB::table('aulas')          
        ->where('id','=',$id)
        ->update(['aula_titulo'=>$request->aula_titulo,'aula_descricao'=>$request->aula_descricao,'aula_duracao'=>$request->aula_duracao,'aula_link'=>$request->aula_link,'modulo_id'=>$request->modulo_id]))
    {
        Session::flash('sms','Actualizada com sucesso');
        return redirect()->back();
    }else{
        Session::flash('sms','Actualizada com sucesso');
        return redirect()->back();
    }

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
        Aulas::find($id)->delete();
        Session::flash('sms','A aula foi eliminada com sucesso');
        return redirect()->back();
    }


}
