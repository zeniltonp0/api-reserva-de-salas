<?php

namespace App\Rules;

use Closure;
use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\ValidationRule;

class SemConflitoRule implements ValidationRule
{
    protected $request;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $inicio = $this->request->inicio;
        $fim = $this->request->fim;
        $salaId = $this->request->sala_id;

        if (!$inicio || !$fim || !$salaId) {
            return;
        }

        $conflito = Agendamento::where('sala_id', $salaId)
            ->whereIn('status_id', [1, 2]) 
            ->where(function ($query) use ($inicio, $fim) {
                $query->where('inicio', '<', $fim)
                      ->where('fim', '>', $inicio);
            })->exists();

        if ($conflito) {
            $fail('Já existe uma solicitação pendente para esta sala, tente novamente mais tarde.', null);
        }
    }
}
