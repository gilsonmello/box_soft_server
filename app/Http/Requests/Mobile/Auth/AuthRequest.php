<?php

namespace App\Http\Requests\Mobile\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => 'required|max:255|email',
            'password' => 'required|max:255'
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
            'email.required' => 'O campo E-mail é obrigatório',
            'email.max' => 'E-mail com no máximo 255 carácteres',
            'email.email' => 'E-mail inválido',
            'password.required' => 'O campo Senha é obrigatório',
            'password.max' => 'Senha com no máximo 255 carácteres'
        ];
    }
}
