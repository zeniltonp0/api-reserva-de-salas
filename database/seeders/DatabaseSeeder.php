<?php

namespace Database\Seeders;

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
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 12345678,
            'role' => 'estudante'
        ]);

        $this->call([
            TipoSalaSeeder::class,
            PredioSeeder::class,
            SalaSeeder::class,
        ]);
    }
}
