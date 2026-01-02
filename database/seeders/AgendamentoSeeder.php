<?php

namespace Database\Seeders;

use App\Models\Agendamento;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgendamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agendamento::factory()->count(7)->create();
    }
}
