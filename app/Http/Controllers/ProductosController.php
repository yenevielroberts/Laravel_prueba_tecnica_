<?php

namespace App\Http\Controllers;
use App\Models\Categorias;
use App\Models\Productos;
use App\Models\ProductosAlergenos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    //Función que deveulve todos los productos /products/get
    public function getAllProductos(){

        $productos=Productos::with(['categoria','alergenos'])->get();

        return view('productos.homePage',["productos"=>$productos]);
    }

    //función que devuelve los productos por categorias /products/get/{categoriaID}
    public function getProductsByCategoria(Request $request){

        //para empezar los parametro? y para separar entre ellos &
        $categoriaId=$request->input('categoriaId');
        $alergenoId=$request->input('alergenoId');

        if($categoriaId!=null && $alergenoId!=null){

             $productos=ProductosAlergenos::where('alergeno_id',$alergenoId)->get();
            return $productos;

        }else if($categoriaId!=null){

               $productos=Productos::with('categoria')->where('categoria_id',$categoriaId)->get();//Con el with hace dos consultas por cada tabla en luego los combina en memoria

             return view('products.lista',['productos'=>$productos]);
        }else{
            $productos=Productos::orderby('created_at','desc')->get();
            return view('products.lista',['productos'=>$productos]);

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


/**
 * Busca devuelve el id del alergeno que coincida con el nombre 
 * luego devuelve todos losproductos que tengan ese alegerno
 * $nombreAlergeno="Buddy Schaden
*   $alergeno=Alergenos::where('nombre_ale', $nombreAlergeno)->firs(); first() ejecuta la consulta

*   $datos=ProductosAlergenos::where('alergeno_id',$alergeno->id)->get();
 */