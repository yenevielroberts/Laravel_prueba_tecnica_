<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
     protected $fillable=['nombre','tipo','descripción','categoria_id'];
    /** @use HasFactory<\Database\Factories\PedidoFactory> */
    use HasFactory;
}
