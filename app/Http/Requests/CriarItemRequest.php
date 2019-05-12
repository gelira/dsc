<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'item.nome' => 'required|max:50',
            'item.quantidade' => 'required|integer|min:1',
            'item.preco' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'item.nome.required' => 'O nome do produto é obrigatório',
            'item.quantidade.required' => 'A quantidade do produto é obrigatório',
            'item.preco.required' => 'O preço do produto é obrigatório',
            'max' => 'O nome do produto deve ter no máximo :max caracteres',
            'integer' => 'O campo quantidade deve ser um número inteiro',
            'numeric' => 'O campo preço deve ter um valor numérico',
            'min' => 'A quantidade não pode ser menor que :min'
        ];
    }
}
