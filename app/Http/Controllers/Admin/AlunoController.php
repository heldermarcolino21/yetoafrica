<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cursos;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        $listaCursos=Cursos::listaCursosAl(auth()->user()->id);
           return view('negocio.estudante.cursos',compact('listaCursos')); 
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('negocio.estudante.cursos');  
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
