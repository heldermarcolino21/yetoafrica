<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newslater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NewslaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaNewslater=Newslater::select('id','email')->paginate(5);
        return view('admin.newslater.index',compact('listaNewslater'));
    }

    public function store(Request $request)
    {
        $dados=new Newslater;
        $data = $request->all();
        $validacao = \Validator::make($data,[
          'email' => 'required|string|email|max:255|unique:users',
        ],[
         //Mensagens de validação de erros
         'email.required'=>'Por favor, informe o email',
         'email.unique'=>'O email já foi associado a outra conta',
     ]);
  
        if($validacao->fails()){
          return redirect()->back()->withErrors($validacao)->withInput();
        }
        $dados->email=$request->input('email');
 //inserir modulo no curso
 if($dados->save()){
    Session::flash('sms','Enviado com sucesso');
    return redirect()->back();
    }

    }

    public function show($id)
    {
        return Newslater::find($id);
    }

    public function update(Request $request, $id)
    {
        if(DB::table('newslater')          
        ->where('id','=',$id)
        ->update(['email'=>$request->email]))
    {
        Session::flash('sms','Actualizado com sucesso');
        return redirect()->back();
    }    
    }

    public function destroy($id)
    {
        Newslater::find($id)->delete();
        Session::flash('sms','Eliminado com sucesso');
        return redirect()->back();
    }
}
