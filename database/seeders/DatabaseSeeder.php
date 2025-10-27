<?php

namespace Database\Seeders;

use App\Models\PedidosProductos;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'apple',
            'email' => 'apple@abalit.org',
            'password'=>'1234',
            'user_type'=>'normal'
        ]);

        $this->call([
            CategoriasSeeder::class,
            ProductosSeeder::class,
            AlergenosSeeder::class,
            PedidoSeeder::class,
            ProductosAlergenosSeeder::class,
            PedidosProductosSeeder::class
        ]);
    }
}
