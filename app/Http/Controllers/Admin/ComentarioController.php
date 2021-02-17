<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComentRequest;
use App\Notifications\PulicacaoComentada;

class ComentarioController extends Controller
{
    public function store(StoreComentRequest $request){
       // dd($request->all());
        $coment=$request->user()->comentario()->create($request->all());
        $author=$coment->publicacao->user;
        $author->notify(new PulicacaoComentada($coment));

        return redirect()
        ->route('publicacao.show',$coment->publicacao->id)
        ->withSuccess('Comentário Realizado com sucesso');         
       
    }
}
