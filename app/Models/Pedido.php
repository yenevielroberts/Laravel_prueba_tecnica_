<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
     protected $fillable=['pickup_day','pickup_time','address','payment_type'];
    /** @use HasFactory<\Database\Factories\PedidoFactory> */
    use HasFactory;

    public function pedidoProductos(){
    return $this->belongsTo(PedidosProductos::class);
   }
}
