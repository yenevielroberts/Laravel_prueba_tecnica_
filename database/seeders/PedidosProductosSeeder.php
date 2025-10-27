<?php

namespace Database\Seeders;

use App\Models\PedidosProductos;
use App\Models\Productos;
use App\Models\Pedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidosProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //Me asguro que ca pedido tenga productos
        $productos=Productos::all();
        //Obtengo todos o¡los records y los ejecuto uno por uno
        Pedido::all()->each(function ($pedido) use ($productos) {
            //Accedo a la relacion
            $pedido->productos()->attach(//Con este metodoinserto filas a la tabla auxiliar.
                $productos->random(rand(1, 3))->pluck('id')->toArray(),
                //El random elige entre 1 y 3 productos existentes para poner en la tabla auxiliar
                ['precio_pro' => $productos->random()->precio_pro]
                //le digo que tambien guarde los precios
            );
        });
    }
}
