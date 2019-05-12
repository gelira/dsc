<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriarUsuarioRequest extends FormRequest
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
            'usuario.email' => 'required|email|max:50',
            'usuario.login' => 'required|max:10|unique:usuarios,login',
            'usuario.senha' => 'required',
            'confirmSenha' => 'required|same:usuario.senha'
        ];
    }

    public function messages()
    {
        return [
            'confirmSenha.same' => 'Os campos de senha não conferem',
            'usuario.login.max' => 'O login deve ter no máximo 10 caracteres',
            'unique' => 'O login :input já existe. Escolha outro'
        ];
    }
}
