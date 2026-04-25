<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateGameRequest extends FormRequest
{
    
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
            'game_id' => ['required', 'integer', 'exists:games,id'],
            'team_one_points' => ['required', 'integer', 'min:0'],
            'team_two_points' => ['required', 'integer', 'min:0'],
        ];
    }


    public function messages(): array {
        return [
            'game_id.required' => 'Problemas internos! Código 2001. Por favor, contate o suporte.',
            'game_id.integer' => 'Problemas internos! Código 2002. Por favor, contate o suporte.',
            'game_id.exists' => 'Problemas internos! Código 2003. Por favor, contate o suporte.',
            'team_one_points.required' => 'Nenhum placar pode estar vazio.',
            'team_one_points.integer' => 'Placar inválido.',
            'team_one_points.min' => 'O placar deve ter no mínimo :min.',
            'team_two_points.required' => 'Nenhum placar pode estar vazio.',
            'team_two_points.integer' => 'Placar inválido.',
            'team_two_points.min' => 'O placar deve ter no mínimo :min.',
        ];
    }
}
