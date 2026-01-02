<?php

namespace Database\Seeders;

use App\Models\Sala;
use App\Models\Equipamento;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sala::factory()->count(10)->hasAttached(Equipamento::factory()->count(3),
                fn () => [
                        'quantidade' => fake()->numberBetween(1, 10),
                        'ativo' => fake()->boolean(), 
                ]
                        
            )->create();
    }
}
