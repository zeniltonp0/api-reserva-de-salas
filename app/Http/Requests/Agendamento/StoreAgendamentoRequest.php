<?php

namespace App\Http\Requests\Agendamento;

use App\Rules\SemConflitoRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAgendamentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sala_id' => ['required', Rule::exists('salas', 'id'), new SemConflitoRule($this)],
            'inicio' => ['required', 'date', 'after:now'],
            'fim' => ['required', 'date', 'after:inicio'],
            'motivo' => ['string', 'min:5', 'max:255']
        ];
    }
}
