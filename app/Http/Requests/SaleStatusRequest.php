<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleStatusRequest extends FormRequest
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
            'name' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Preencha Esse Campo!',
            'string' => 'Esse Campo Só Aceita Texto'
        ];
    }
}
