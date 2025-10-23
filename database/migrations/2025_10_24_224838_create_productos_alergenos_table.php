<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos_alergenos', function (Blueprint $table) {
            //Laravel Eloquent no permite hacer primary keys compuesta y por ello hay que  campos unique
            $table->id();
            $table->foreignId('pedidos_id')->constrained();
            $table->foreignId('alergenos_id')->constrained();
            $table ->unique(['pedidos_id','alergenos_id']);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_alergenos');
    }
};
