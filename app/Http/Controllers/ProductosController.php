<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Pedido;
use App\Models\Productos;
use App\Models\ProductosAlergenos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    //Función que deveulve todos los productos /products/get
    public function getAllProductos(){
        $productos=Productos::join('productos_alergenos', 'productos.id','=','productos_alergenos.producto_id')->join('alergenos', 'alergenos.id','=','productos_alergenos.alergeno_id')->select('productos.*','alergenos.nombre_ale as nombre_alergeno')->get();

       // return view('lista',["productos"=>$productos]);

       return $productos;
    }

    //función que devuelve los productos por categorias /products/get/{categoriaID}
    public function getProductsByCategoria(Request $request){

        $categoriaId=$request->input('categoria_id');
        if($categoriaId){
            $productos=Productos::where('categoria_id',$categoriaId)->with('categorias')->get();//Con el with hace dos consultas por cada tabla en luego los combina en memoria

            return view('lista',['productos'=>$productos]);
        }else{

             $productos=Productos::orderby('created_at','desc')->get();
                return view('lista',['productos'=>$productos]);

        }
    }

    //función que deveulve todas las categorias /categorias/get
    public function getCategorias(){
        $categorias=Categorias::orderby('created_at','desc')->get();
        
        return view('categorias',["categorias"=>$categorias]);
    }

    public function vistaCategorias(){
         $categorias=Categorias::orderby('created_at','desc')->get();
         
       return view('categorias',['categorias'=>$categorias]);
    }

    // /search/
    public function search(Request $request){
        $keyword=$request->input("keyword");

        if(empty($keyword)){
            return response()->json([]);
        }
        //$query es la variable interna y representa la subconsulta
        //use para definir los parametros
        //función anonima
        $productos=Productos::where(function ($query) use ($keyword){
            $query->where('nombre_pro','LIKE','%'.$keyword.'%')->Orwhere('descripcion_pro','LIKE','%'.$keyword.'%');
        })->get();

        return $productos;

    }
 
}
