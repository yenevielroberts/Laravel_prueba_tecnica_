<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alergenos extends Model
{
    /** @use HasFactory<\Database\Factories\AlergenosFactory> */
    use HasFactory;

    protected $fillable=['nombre_ale'];

    public function productosAlergenos(){
    return $this->belongsTo(productosAlergenos::class,'alergeno_id');
   }
}
