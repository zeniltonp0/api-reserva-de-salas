<?php

namespace Database\Factories;

use App\Models\Sala;
use App\Models\User;
use App\Models\StatusAgendamento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agendamento>
 */
class AgendamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(['role' => 'estudante']),
            'sala_id' => Sala::factory(),
            'inicio' => now(),
            'fim' => fake()->dateTime(),
            'status_id' => StatusAgendamento::factory(),
            'motivo' => fake()->sentence(10),
        ];
    }
}
