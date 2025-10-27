<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
     protected $fillable=['pickup_day','pickup_time','address','payment_type'];
    /** @use HasFactory<\Database\Factories\PedidoFactory> */
    use HasFactory;

    public function user(){
      return $this->belongsTo(User::class);
    }
    public function productos(){
    return $this->belongsTo(PedidosProductos::class,'pedidos_productos','pedido_id','producto_id')->withPivot('precio_pro');
   }
}
