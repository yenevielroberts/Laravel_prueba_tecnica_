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
        Schema::create('pedidos_productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productos_id')->constrained();
            $table->foreignId('pedidos_id')->constrained();
            $table->float('total_ped');
            $table->unique(['productos_id','pedidos_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_productos');
    }
};
