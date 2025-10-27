<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidosController extends Controller
{
    public function cesta(){
        return view('productos.cesta');
    }


    public function setOrder(Request $request ){

        $pedido=$request->all();

        Pedido::create($pedido);

        return "Pedido creado";
    }

    public function history(){
        $historial=Pedido::orderby('created_at','desc')->get();

        return $historial;
    }

}
