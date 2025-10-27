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
        static $combinacionUsadas=[]; // guardo las combinaciones ya usadas
        $productoId = $this->faker->numberBetween(1, Productos::count());//rango entre 1 y la cantidad de records que haya en la tabla productos
        $alergenoId = $this->faker->numberBetween(1, Alergenos::count());

         // Genero las combinaciones únicas
        while (in_array("$productoId-$alergenoId", $combinacionUsadas)) {//miro si dentro del array estan las combionaciones
            $productoId = $this->faker->numberBetween(1, Productos::count());
            $alergenoId = $this->faker->numberBetween(1, Alergenos::count());
        }

         $usedPairs[] = "$productoId-$alergenoId";//Guardo las nuevas combinaciones

        return [
            //Asigno las combinaciones unicas
            'producto_id'=>$productoId,
            'alergeno_id'=>$alergenoId
        ];
    }
}
