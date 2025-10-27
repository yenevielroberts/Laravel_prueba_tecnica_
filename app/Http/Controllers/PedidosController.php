<?php

namespace App\Http\Controllers;

use App\Models\Cesta;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidosProductos;
use App\Models\Productos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PedidosController extends Controller
{
    public function pedidosPorUsario(){
        $user=Auth::user();
        // Obtengo los pedidos del usuario
        $pedidosId=Pedido::where('user_id',$user->id)->pluck('id');// Obtengo Solo los IDs
        
        // obtengo todos los productos de esos pedidos de uno a la vez
        $datos=Pedido::with('productos')->whereIn('id', $pedidosId)->get();
        //dd($datos);
       
        return response()->json([$datos],200);
       // return view('productos.cesta',['pedidoUser'=>$datos]);
    }

    public function cesta(Request $request){
        $userId=Auth::user()->id;
        $productoId=$request->route('productoId');


        if(!$productoId){
            return  redirect()->back()->with('error','Prodcutono expecificado');
        }

        //dd($productoId);

        $cesta=Cesta::firstOrNew(
            [ 'user_id'=>$userId,'producto_id'=>$productoId],
            ['cantida'=>1]
        );
        $cesta->cantidad+=1;
        $cesta->save();

        return response()->json(['mensaje'=>"producto agregado a la cesta",'cesta'=>$cesta]);
    }

    public function verCesta(){
         $userId=Auth::user()->id;

         $cesta=Cesta::with('producto')->where('user_id',$userId)->get();

         return view('productos.cesta',['cesta'=>$cesta]);
    }



    public function setOrder(Request $request ){

       $user=Auth::user();
       $cesta=Cesta::where('user_id',$user->id)->get();

       //creo el pedido
        $pedido=Pedido::create([
            'user_id'=>$user->id,
            'pickup_day'=>$request->pickup_day,
            'pickup_time'=>$request->pickup_time,
            'address'=>$request->address,
            'payment_type'=>$request->payment_type

        ]);

        //aisgno los pedidos de la cesta a la tabla auxiliar(pivot)
        foreach($cesta as $item){
            $pedido->productos()->attach($item->producto_id,['precio_pro'=>$item->producto->precio_pro]);
        }

        Cesta::where('user_id',$user->id)->delete();

        return view('productos.homePage')->with('mensaje','Pedido confirmado');
    }

    public function history(){
        $historial=Pedido::with('productos')->get();

        return response()->json([$historial],200);
    }

}
