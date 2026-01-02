<?php

namespace Database\Factories;

use App\Models\Predio;
use App\Models\TipoSala;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sala>
 */
class SalaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_sala_id' => TipoSala::factory(),
            'predio_id' => Predio::factory(),
            'nome' => fake()->word(),
            'capacidade' => fake()->numberBetween(10, 30),
            'andar' => fake()->numberBetween(1, 3),
            'ativa' => fake()->boolean(),
        ];
    }
}
