<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $fillable=['type_cat'];
    /** @use HasFactory<\Database\Factories\CategoriasFactory> */
    use HasFactory;

     public function productos(){
        //Le digo que en la tabla productos los registro que tienen la categoria_id = id de esta categoría pertenecen a esta categoria.
        return $this->hasMany(Productos::class, 'categoria_id');
    }
}
