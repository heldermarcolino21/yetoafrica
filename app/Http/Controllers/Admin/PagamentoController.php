<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function pagamento(){
        $listaCategorias=Categorias::all();
        return view('admin.pagamento.index',compact('listaCategorias'));
    }
}
