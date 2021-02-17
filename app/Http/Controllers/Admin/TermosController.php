<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermosController extends Controller
{
    public function index(){

        return view('admin.termos.index');
    }
}
