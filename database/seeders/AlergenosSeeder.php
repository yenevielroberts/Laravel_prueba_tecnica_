<?php

namespace Database\Seeders;

use App\Models\Alergenos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlergenosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alergenos::factory()->count(8)->create();
    }
}
