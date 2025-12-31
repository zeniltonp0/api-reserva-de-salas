<?php

use App\Models\Sala;
use App\Models\Equipamento;
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
        Schema::create('equipamento_sala', function (Blueprint $table) {
            $table->foreignIdFor(Sala::class, 'sala_id')->constrained();
            $table->foreignIdFor(Equipamento::class, 'equipamento_id')->constrained();
            $table->integer('quantidade');
            $table->boolean('ativo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamento_sala');
    }
};
