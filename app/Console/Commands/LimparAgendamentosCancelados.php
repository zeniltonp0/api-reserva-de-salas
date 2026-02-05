<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Agendamento;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Log;
use function Symfony\Component\Clock\now;

class LimparAgendamentosCancelados extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:limpar-agendamentos-cancelados';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dias = 30;
        $dataLimite = Carbon::now()->subDays($dias);

        $query = Agendamento::where('status_id', 3)
            ->where('updated_at', '<', $dataLimite);

        $query->forceDelete();

        Log::info("Limpeza Automática: agendamentos cancelados foram removidos.");
    }
}
