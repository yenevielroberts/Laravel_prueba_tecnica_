<?php

namespace Database\Factories;

use App\Models\Alergenos;
use App\Models\Productos;
use App\Models\ProductosAlergenos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos_alergenos>
 */
class ProductosAlergenosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProductosAlergenos::class;//Le digo digo manualmnente que modelo representa ya que el nombre del modelo no sigue la convención tipica porque tiene un guio y debido a eso Laravel no pueden encontrarlo automaticamente
    public function definition(): array
    {
        return [
            'producto_id'=>Productos::inRandomOrder()->first()->id,
            'alergeno_id'=>Alergenos::inRandomOrder()->first()->id
        ];
    }
}
