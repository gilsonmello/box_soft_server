<?php

namespace App\Http\Requests\Mobile\Box;

use Illuminate\Foundation\Http\FormRequest;

class BoxCreateRequest extends FormRequest
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
            'name' => 'required',
            'value_total' => 'required',
            'date_begin' => 'required',
            'date_end' => 'required',
            'participant_id'  => 'required|array|min:2',
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
            'value_total.required' => 'O campo Valor Total é obrigatório',
            'date_begin.required' => 'O campo Data Inicial é obrigatório',
            'date_end.required' => 'O campo Data Final é obrigatório',
            'participant_id.required' => 'O campo Participante é obrigatório',
            'participant_id.min' => 'Selecione ao menos 1 participante',
        ];
    }
}
