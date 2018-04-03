<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleStore extends FormRequest
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
            'name' => 'required|unique:roles',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'O campo NAME é Obrigatório!',
            'name.unique' => 'Já existe uma ROLE cadastrada com este nome!',
        ];
    }
}
