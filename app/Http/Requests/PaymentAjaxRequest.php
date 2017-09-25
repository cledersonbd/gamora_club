<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentAjaxRequest extends FormRequest
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
            'plan'=>'required',
            'method'=>'required',
        ];
    }

    public function messages()
    {
        return [
            "plan.required" => 'Você precisa escolher um plano',
            "method.required" => 'Você precisa escolher um método de pagamento'
        ];
    }


//    function validar_cpf($cpf)
//    {
//        $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);
//        // Valida tamanho
//        if (strlen($cpf) != 11)
//            return false;
//        // Calcula e confere primeiro dígito verificador
//        for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
//            $soma += $cpf{$i} * $j;
//        $resto = $soma % 11;
//        if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto))
//            return false;
//        // Calcula e confere segundo dígito verificador
//        for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
//            $soma += $cpf{$i} * $j;
//        $resto = $soma % 11;
//        return $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);
////        var_dump(validar_cpf('111.444.777-35'));
//    }
}
