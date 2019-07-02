<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingrediente;
use App\Compra;

class BodegaController extends Controller
{
    public function index(){
        $ingredientes = Ingrediente::all();
        $compras = Compra::orderBy('id', 'desc')->paginate(10);
        return view('bodega',['ingredientes'=>$ingredientes,'compras'=>$compras]);
    }
}
