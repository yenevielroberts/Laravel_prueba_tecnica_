<?php

namespace Database\Factories;

use App\Models\Categorias;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
 */
class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipo=['normal','delivery'];
        return [
            'nombre'=>fake()->name(),
            'tipo'=>fake()->randomElement($tipo),
            'descripcion'=>fake()->realText(100),
           'categoria_id'=>Categorias::inRandomORder()->first()->id,
        ];
    }
}
