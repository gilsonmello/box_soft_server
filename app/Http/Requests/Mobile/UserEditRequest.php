<?php

namespace App\Http\Requests\Mobile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserEditRequest extends FormRequest
{
    public function __construct()
    {
        Validator::extend('current_password', function ($attribute, $value, $parameters)
        {
            $user = User::find($parameters[0]);
            return $user && Hash::check($value, $user->laravel_password);
        });
    }

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
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->id.',id',
        ];

        if(!empty($this->old_password)) {
            $rules['old_password'] = 'required|current_password:'.$this->id;
            $rules['password'] = 'required|min:6';
            $rules['confirm_password'] = 'required|min:6|same:password';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        $messages = [

        ];

        if(!empty($this->old_password)) {
            $messages['old_password.required'] = 'Informe a senha antiga';
            $messages['old_password.current_password'] = 'Senha Inválida';
            $messages['password.required'] = 'Campo senha atual é obrigatório';
            $messages['password.min'] = 'O campo senha atual deve ter no mínimo 6 cáractes';
            $messages['confirm_password.same'] = 'Campo deve ser igual a senha informada';
            $messages['confirm_password.required'] = 'Campo confirme a senha é obrigatório';
            $messages['confirm_password.min'] = 'O campo confirme a senha atual deve ter no mínimo 6 cáractes';
        }

        return $messages;
    }
}
