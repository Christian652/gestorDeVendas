<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'rg' => ['required', 'string', 'max:14', 'min:14'],
            'cpf' => ['required', 'string', 'max:14', 'min:14'],
            'email' => ['required', 'string', 'max:255', 'email']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Preencha Esse Campo!',
            'string' => 'Esse Campo Deve Receber Um Valor Textual!',
            'email' => 'Esse Campo é Um Email Certifique-Se de Usar @ e Não Use Acentos!',
            'max' => 'Esse Campo Aceita no Maximo :max Caracteres!',
            'min' => 'Esse Campo Aceita Apenas no Minimo :min Caracteres'
        ];
    }
}
