<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosAlergenos extends Model
{
    /** @use HasFactory<\Database\Factories\ProductosAlergenosFactory> */
    use HasFactory;

    protected $fillable=['producto_id','alergeno_id'];

    public function productos(){
        return $this->hasMany(Productos::class,'producto_id');
    }

    public function alergenos(){
        return $this->hasMany(Alergenos::class,'alergeno_id');
    }
}
