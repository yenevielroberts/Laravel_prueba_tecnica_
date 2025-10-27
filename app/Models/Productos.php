<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    /** @use HasFactory<\Database\Factories\ProductosFactory> */
    use HasFactory;

    protected $fillable=['nombre_pro','tipo_pro','descripcion_pro','precio_pro','categoria_id'];
    
   public function categoria(){
    //Le digo cual columna conecta la tabla produtos con categorias

    //si el nombre coincide con el nombre del modelo no tengo que expeicificarlo pero en este caso el model es categorias y la columna categoria
    return $this->belongsTo(Categorias::class,'categoria_id');
   }

   public function alergenos(){
    return $this->belongsToMany(Alergenos::class,'productos_alergenos','producto_id','alergeno_id');
   }

    public function pedidos(){
    return $this->belongsToMany(Pedido::class,'pedidos_productos', 'producto_id', 'pedido_id')->withPivot('precio_pro');
   }

   public function cesta(){
    return $this->belongsTo(cesta::class,'producto_id');
   }
}
