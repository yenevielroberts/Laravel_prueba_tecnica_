<?php

namespace Database\Seeders;

use App\Models\ProductosAlergenos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosAlergenosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductosAlergenos::factory()->count(5)->create();
    }
}
