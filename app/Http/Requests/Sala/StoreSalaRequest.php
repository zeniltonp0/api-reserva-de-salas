<?php

namespace App\Http\Requests\Sala;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSalaRequest extends FormRequest
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
            'tipo_sala_id' => ['required', Rule::exists('tipo_salas', 'id')],
            'predio_id' => ['required', 'integer', Rule::exists('predios', 'id')],
            'nome' => ['string', 'min:2', 'max:255'],
            'capacidade' => ['required', 'integer', 'min:1', 'max:255'],
            'andar' => ['required', 'integer'],
            'ativa' => ['required', 'boolean']
        ];
    }
}
