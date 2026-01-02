<?php

namespace Database\Seeders;

use App\Models\TipoSala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoSala::factory()->count(5)->create();
    }
}
