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
            'name' => "required|string|max:200",
            'cpf' => "required|string|max:14|min:14",
            'rg' => "required|string|max:14|min:14",
            'email' => "required|string|max:200",
            'cell1' => "required|string|max:13",
            'cell2' => "required|string|max:13",
            'address' => "required|string|max:200",
            'district' => "required|string|max:200",
            'birthday' => "required|string|max:10",
            'cep' => "required|string|max:10",
            'referencepoint' => "required|string|max:200",
            'endday' => "required|string|max:2",
            'installationdate' => "required|string|max:100",
            'planreference_id' => "required"
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'Preencha Esse Campo!',
            'string' => 'Esse Campo Só Aceita Texto!',
            'max' => 'Esse Campo Aceita No Maximo :max Caracteres!',
            'min' => 'Esse Campo Precisa Exatamente de :min Caracteres!'
        ];
    }
}
