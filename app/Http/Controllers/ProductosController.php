<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Pedido;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    //Función que deveulve todos los productos /products/get
    public function getAllProductos(){
        $productos=Productos::with('categorias')->orderby('created_at','desc')->get();

        return view('lista',["productos"=>$productos]);
    }

    //función que devuelve los productos por categorias
    
    public function getProducts($categoriaId=null){

        if($categoriaId){
            $productos=Productos::where('categoria_id',$categoriaId)->get();

            if(!$productos){
                return "No data found";
            }else{
                return view('lista',['"productos'=>$productos]);
            }
           
          
        }else{
             $productos=Productos::with('categorias')->orderby('created_at','desc')->get();
                return $productos;
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
        $nombre=$request->input('nombre');
        $descripcion=$request->input('descripcion');

        $productos=Productos::where('nombre',$nombre)->where('descripcion',$descripcion)->get();

        return $productos;

    }

    public function setOrderVista(){
        return view('setOrder');
    }


    public function setOrder(Request $request ){

        $pedido=Pedido::create($request->all());

        return "";
    }

    public function history(){
        $historial=Pedido::orderby('created_at','desc')->get();

        return $historial;
    }

    public function editUser(Request $request){
        

    }
}
