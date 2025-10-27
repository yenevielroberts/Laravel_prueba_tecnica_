<?php

namespace App\Http\Controllers;

use App\Models\Alergenos;
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

    public function getOneProduct(Request $request){

        $productoId=$request->route('productoId');
        $producto=Productos::with(['categoria','alergenos'])->where('id',$productoId)->first();
        return view('productos.detalle',['producto'=>$producto]);
    }

    //función que devuelve los productos por categorias /products/get/
    public function getProductsByCategoria(Request $request){

        //para empezar los parametro? y para separar entre ellos &
        $tiposComida=$request->input('tiposComida');
        $alergenos=$request->input('alergenos');
        $resultados=collect();

        if(!empty($tiposComida)&& !empty($alergenos)){

            foreach($tiposComida as $tipo){

                foreach($alergenos as $alergeno){

                    $productos=Productos::with(['categoria','alergenos'])->whereHas('categoria',function($query) use ($tipo){
                        $query->where('type_cat',$tipo);
                    })->whereHas('alergenos', function($query) use($alergeno){
                        $query->where('nombre_ale',$alergeno);
                    })->get();

                    $resultados=$resultados->merge($productos);//Con esto junto todos las coleciones y no tengo un array de coleciones. Luego en la vista tendria que hacer dos bucles

                }
               
            }
              return view('productos.resultadosSearch',['resultados'=>$resultados]);
        }else if(!empty($tiposComida)){

             foreach($tiposComida as $tipo){
                //whereHas Filtra los productos según un campo de la tabla categorias.
                $productos=Productos::with('categoria')->whereHas('categoria',function($query) use($tipo){
                    $query->where('type_cat',$tipo);
                })->get();

                $resultados=$resultados->merge($productos);
            }
            //dd($resultados);
            return view('productos.resultadosSearch',['resultados'=>$resultados]);
                 
        }else if(!empty($alergenos)){
    
            foreach($alergenos as $alergeno){

                $productos=Productos::with('alergenos')->whereHas('alergenos',function($query) use($alergeno){
                    $query->where('nombre_ale',$alergeno);
                })->get();
                $resultados=$resultados->merge($productos);
            }

            return view('productos.resultadosSearch',['resultados'=>$resultados]);
        }else{

             $productos=Productos::orderby('created_at','desc')->get();
            return view('productos.resultadosSearch',['resultados'=>$productos]); 
        }

        
    }

    //función que deveulve todas las categorias /categorias/get
    public function getCategorias(){
        $categorias=Categorias::orderby('created_at','desc')->get();
        
        return response()->json([$categorias],200);
    }

    public function searchForm(){
        $tiposComida=Categorias::orderBy('type_cat','desc')->get();
        $alergenos=Alergenos::orderBy('nombre_ale','desc')->get();

        return view('productos.search',['tiposComida'=>$tiposComida,'alergenos'=>$alergenos]);
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

        if($productos ->isEmpty()){
              return redirect()->route('searchForm')->with('mensaje','No se encontro productos con estosfiltros');
        }else{
           return view('productos.resultadosSearch',['resultados'=>$productos,'keyword'=>$keyword]);
        }
       
    }
 
}


/**
 * Busca devuelve el id del alergeno que coincida con el nombre 
 * luego devuelve todos losproductos que tengan ese alegerno
 * $nombreAlergeno="Buddy Schaden
*   $alergeno=Alergenos::where('nombre_ale', $nombreAlergeno)->firs(); first() ejecuta la consulta

*   $datos=ProductosAlergenos::where('alergeno_id',$alergeno->id)->get();
 */