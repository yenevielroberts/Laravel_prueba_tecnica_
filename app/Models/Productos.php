<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    /** @use HasFactory<\Database\Factories\ProductosFactory> */
    use HasFactory;

   public function categorias(){
    return $this->belongsTo(Categorias::class);
   }
}
