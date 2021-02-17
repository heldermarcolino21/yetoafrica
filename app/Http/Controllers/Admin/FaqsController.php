<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use App\Models\Faqs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaPerguntas=Faqs::paginate(10);
        
        return view('admin.faqs.index',compact('listaPerguntas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados=new Faqs;
        $dados->pergunta=$request->input('pergunta');
        $dados->resposta=$request->input('resposta');
        $dados->status=false;
     //inserir modulo no curso
     if($dados->save()){
        Session::flash('sms','A pergunta foi inserida com sucesso');
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
        return Faqs::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
  
          if(DB::table('faqs')          
          ->where('id','=',$id)
          ->update(['pergunta'=>$request->pergunta,'resposta'=>$request->resposta]))
      {
          Session::flash('sms','A pergunta foi actualizada com sucesso');
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
        Faqs::find($id)->delete();
        Session::flash('sms','Eliminado com sucesso');
        return redirect()->back();
    }

    public function faqs(){
        $listaPerguntas=Faqs::paginate(10);
        return view('admin.faqs.perguntas',compact('listaPerguntas'));
    }
}
