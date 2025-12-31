<?php

use App\Models\Sala;
use App\Models\StatusAgendamento;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->constrained();
            $table->foreignIdFor(Sala::class, 'sala_id')->constrained();
            $table->dateTime('inicio');
            $table->dateTime('fim');
            $table->foreignIdFor(StatusAgendamento::class, 'status_id')->constrained();
            $table->text('motivo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
