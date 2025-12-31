<?php

use App\Models\Predio;
use App\Models\TipoSala;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TipoSala::class)->constrained();
            $table->foreignIdFor(Predio::class, 'predio_id')->constrained();
            $table->string('nome');
            $table->integer('capacidade');
            $table->integer('andar');
            $table->boolean('ativa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salas');
    }
};
