<?php

namespace Database\Seeders;

use App\Models\PedidosProductos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidosProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PedidosProductos::factory()->count(3)->create();
    }
}
