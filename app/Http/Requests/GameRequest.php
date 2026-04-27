<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class GameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        if(Gate::allows('is-admin')) {
            return true;
        }
        return false;
    }

    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'stage_type'  => ['required', 'string', 'in:standing,bracket'],
            'team_one_id' => ['required', 'integer'],
            'team_two_id' => ['required', 'integer', 'different:team_one_id'],
            'place_id'    => ['required', 'integer'],
            'modal_id'    => ['required', 'integer'],
            'date'        => ['required', 'date'],
        ];
    }


    public function messages(): array
    {
        return [
            'stage_type.required' => 'O campo formato do jogo é obrigatório.',
            'stage_type.string' => 'Erro 2005. Entrar em contato como suporte.',
            'stage_type.in' => 'Erro 2006. Entrar em contato como suporte.',

            'team_two_id.required' => 'O campo "Time 2" é obrigatório.',
            'team_two_id.integer' => 'O campo "Time 2" deve ser um número inteiro.',
            'team_two_id.exists' => 'O time selecionado para "Time 2" não existe.',
            'team_two_id.different' => 'Os times selecionados devem ser diferentes.',

            'place_id.required' => 'O campo "Local" é obrigatório.',
            'place_id.integer' => 'O campo "Local" deve ser um número inteiro.',
            'place_id.exists' => 'O local selecionado não existe.',

            'modal_id.required' => 'O campo "Modalidade" é obrigatório.',
            'modal_id.integer' => 'O campo "Modalidade" deve ser um número inteiro.',
            'modal_id.exists' => 'A modalidade selecionada não existe.',

            'date.required' => 'O campo "Data" é obrigatório.',
            'date.date' => 'O campo "Data" deve ser uma data válida.',
        ];
    }
}
