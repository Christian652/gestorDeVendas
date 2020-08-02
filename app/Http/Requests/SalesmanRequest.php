<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesmanRequest extends FormRequest
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
            'cpf' => 'required|max:14|string',
            'rg' => 'required|max:14|string',
            'birthday' => 'required|max:10|string',
            'observations' => 'required|max:255|string',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function messages()
    {
        return [    
            'required' => 'Preencha Esse Campo!',
            'string' => 'Esse Campo Só Aceita Texto',
            'email' => 'Esse Campo é Um Email Então Use @!',
            'max' => 'Esse Campo Aceita no Maximo :max Caracteres!',
            'min' => 'Esse Campo Aceita Apenas no Minimo :min Caracteres',
            'unique' => 'Esse Email Já Esta Sendo Usado'
        ];
    }
}
