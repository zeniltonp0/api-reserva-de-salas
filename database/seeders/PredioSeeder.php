<?php

namespace Database\Seeders;

use App\Models\Predio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PredioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Predio::factory()->count(3)->create();
    }
}
