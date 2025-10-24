<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $paymentType=['Efectivo','Tarjeta'];
        return [
            'pickup_day'=>fake()->date(),
            'pickup_time'=>fake()->time(),
            'address'=>fake()->address(),
            'payment_type'=>fake()->randomElement($paymentType)

        ];
    }
}
