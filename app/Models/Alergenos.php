<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alergenos extends Model
{
    /** @use HasFactory<\Database\Factories\AlergenosFactory> */
    use HasFactory;

    protected $fillable=['nombre_ale'];

    public function productos(){
    return $this->belongsToMany(
        //Creo una tabla pivot
        productos::class,
        'productos_alergenos',//Nombre de la tabla auxiliar en la base de datos
        'producto_id',
        'alergeno_id');
   }
}
