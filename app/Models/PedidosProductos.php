<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosProductos extends Model
{
    /** @use HasFactory<\Database\Factories\PedidosProductosFactory> */
    use HasFactory;
    protected $fillable=['producto_id','pedido_id','precio_pro'];

     public function producto(){
        //le digo a Laravel cuál es la clave foránea y cuál es la clave local
        return $this->hasMany(Productos::class,'producto_id');
        // 'pedido_id' => columna en pedidos_productos
        // 'id' => columna en pedidos
    }

     public function pedido(){
        return $this->hasMany(Pedido::class,'pedido_id');
    }
}
