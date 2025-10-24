<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    /** @use HasFactory<\Database\Factories\ProductosFactory> */
    use HasFactory;

   public function categorias(){
    //Le digo cualcolumna conecta la tabla produtos con categorias

    //si el nombre coincide con el nombre del modelo no tengo que expeicificarlo pero en este caso el model es categorias y la columna categoria
    return $this->belongsTo(Categorias::class,'categoria_id');
   }

   public function productosAlergenos(){
    return $this->belongsTo(ProductosAlergenos::class);
   }

    public function pedidoProductos(){
    return $this->belongsTo(PedidosProductos::class);
   }
}
