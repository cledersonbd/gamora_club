<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressAjaxRequest extends FormRequest
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
            "street" => 'required',
            "number" => 'required',
            "extra" => 'required',
            "cep" => 'required',
            "city" => 'required',
            "state" => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            "street.required" => 'Você precisa preencher a sua rua ',
            "number.required" => 'Você precisa preencher o seu número',
            "cep.required" => 'Você precisa preencher o seu cep',
            "city.required" => 'Você precisa preencher a sua cidade',
            "state.required" => 'Você precisa preencher o seu estado'
        ];
    }
}
