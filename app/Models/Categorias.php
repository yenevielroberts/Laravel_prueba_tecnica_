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
        return $this->hasMany(Productos::class);
    }
}
