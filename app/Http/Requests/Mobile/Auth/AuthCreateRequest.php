<?php

namespace App\Http\Requests\Mobile\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthCreateRequest extends FormRequest
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
            'name' => 'required|min:10|regex:/^([\pL\s\ ]+)$/u',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|max:255|confirmed',
            'terms' => 'required',
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
            'name.required' => 'O campo Nome é obrigatório',
            'name.min' => 'Informe o Nome com no mínimo 11 letras',
            'name.regex' => 'Informe o Nome somente com letras',
            'email.required' => 'O campo E-mail é obrigatório',
            'email.max' => 'E-mail com no máximo 255 carácteres',
            'email.email' => 'E-mail inválido',
            'email.unique' => 'O E-mail já encontra-se em uso',
            'password.required' => 'O campo Senha é obrigatório',
            'password.max' => 'Senha com no máximo 255 carácteres',
            'password.confirmed' => 'O campo Confirme a Senha deve ser igual a Senha',
            'terms.required' => 'Aceite os termos de uso',
        ];
    }
}
