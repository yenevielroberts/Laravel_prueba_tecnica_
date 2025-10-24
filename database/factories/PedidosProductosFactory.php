<?php

namespace Database\Factories;

use App\Models\Pedido;
use App\Models\Productos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedidos_productos>
 */
class PedidosProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'producto_id'=>Productos::inRandomOrder()->first()->id,
            'pedido_id'=>Pedido::inRandomOrder()->first()->id
        ];
    }
}
