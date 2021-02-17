<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class CertificadoController extends Controller
{
    public function certificado(){
        $certifica= PDF::loadView('admin.certificado.index');
        return $certifica->setPaper('a4')->stream('Certificado.pdf');
    }
}
