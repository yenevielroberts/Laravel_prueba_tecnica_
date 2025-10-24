<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidosController extends Controller
{
    public function setOrderVista(){
        return view('setOrder');
    }


    public function setOrder(Request $request ){

        $pedido=Pedido::create($request->all());

        return $pedido;
    }

    public function history(){
        $historial=Pedido::orderby('created_at','desc')->get();

        return $historial;
    }
}
