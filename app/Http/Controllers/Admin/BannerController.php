<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    public function index()
    {
        $listaMigalhas=json_encode([
            ["titulo"=>"Home","url"=>route('admin')],
            ["titulo"=>"Banner","url"=>route('banner.index')]
        ]);
        $listaBanner=Banner::listaBanner();
      
        return view('admin.banner.index',compact('listaMigalhas','listaBanner'));
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
        $dados=new Banner;
        $img=$request->file('banner_img');
        if($request->file('banner_img')->isValid()){
              $img=$request->file('banner_img')->store('banner');
       }
        $dados->banner_descricao=$request->input('banner_descricao');
        $dados->banner_titulo=$request->input('banner_titulo');
        $dados->banner_data=date('Y-m-d');
        $dados->banner_img=$img;
      //inserir na tabela perfil 
     if($dados->save()){
        Session::flash('sms','O banner foi inserido com sucesso');
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
        return Banner::find($id);
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
        $id1 = base64_decode($id);
        $img=$request->file('banner_img');

        if($img!=null){  
        if($request->file('banner_img')->isValid()){
              $img=$request->file('banner_img')->store('banner');
       }

        if(DB::table('banner')          
            ->where('id','=',$id1)
            ->update(['banner_descricao'=>$request->banner_descricao,'banner_titulo'=>$request->banner_titulo,'banner_data'=>date('Y-m-d'),'banner_img'=>$img]))
        {
            Session::flash('sms','Actualizado com sucesso');
            return redirect()->back();
        }      
    }

    if(DB::table('banner')          
    ->where('id','=',$id1)
    ->update(['banner_descricao'=>$request->banner_descricao,'banner_titulo'=>$request->banner_titulo,'banner_data'=>date('Y-m-d')]))
{
    Session::flash('sms','Actualizado com sucesso');
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
        Banner::find($id)->delete();
        Session::flash('sms','O banner foi eliminado com sucesso');
        return redirect()->back();
    }

}
