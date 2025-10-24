<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos_productos extends Model
{
    /** @use HasFactory<\Database\Factories\PedidosProductosFactory> */
    use HasFactory;
    protected $fillable=['producto_id','pedido_id','total_ped'];

     public function productos(){
        return $this->hasMany(Productos::class);
    }

     public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
