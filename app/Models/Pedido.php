<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
     protected $fillable=['nombre_pro','tipo_pro','descripcion_pro','precio_pro','categoria_id'];
    /** @use HasFactory<\Database\Factories\PedidoFactory> */
    use HasFactory;

    public function pedidoProductos(){
    return $this->belongsTo(PedidosProductos::class);
   }
}
