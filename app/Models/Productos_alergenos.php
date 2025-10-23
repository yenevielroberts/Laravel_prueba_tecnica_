<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos_alergenos extends Model
{
    /** @use HasFactory<\Database\Factories\ProductosAlergenosFactory> */
    use HasFactory;

    protected $fillable=['pedidos_id','alergenos_id'];

    public function productos(){
        return $this->hasMany(Productos::class);
    }

    public function alergenos(){
        return $this->hasMany(Alergenos::class);
    }
}
