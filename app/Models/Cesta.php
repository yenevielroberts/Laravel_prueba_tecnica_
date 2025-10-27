<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cesta extends Model
{
    /** @use HasFactory<\Database\Factories\CestaFactory> */
    use HasFactory;
    protected $fillable=['user_id','producto_id','cantidad'];

     public function user(){
      return $this->belongsTo(User::class,'user_id');
    }
    public function producto(){
    return $this->belongsTo(
      Productos::class, 'producto_id');
   }
}
