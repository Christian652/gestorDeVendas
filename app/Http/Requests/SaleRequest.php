<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'client_id' => ['required', 'integer'],
            'salesman_id' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'totalPrice' => ['required', 'float'],
            'saledDate' => ['required', 'date'],
        ];
    }

    
    public function messages()
    {
        return [
            'required' => 'Preencha Esse Campo!',
            'string' => 'Esse Campo Só Aceita Texto',
            'date' => 'Esse Campo Deve Receber Uma Data!',
            'max' => 'Esse Campo Aceita no Maximo :max Caracteres!',
            'min' => 'Esse Campo Aceita Apenas no Minimo :min Caracteres'
        ];
    }
}
