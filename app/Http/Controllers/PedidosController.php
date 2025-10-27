<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidosProductos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PedidosController extends Controller
{
    public function cesta(){
        $user=Auth::user();
        // Obtengo los pedidos del usuario
        $pedidos=Pedido::where('user_id',$user->id)->pluck('id');// Obtengo Solo los IDs
        
        // obtengo todos los productos de esos pedidos de una vez
        $datos=PedidosProductos::with(['pedido','producto'])->whereIn('pedido_id', $pedidos)->get();
        dd($datos);
       
        return view('productos.cesta',['pedidoUser'=>$datos]);
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
