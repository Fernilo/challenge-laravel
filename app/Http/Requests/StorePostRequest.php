<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'titulo' => 'required|unique:posts',
            'descripcion' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El :attribute es obligatorio',
            'titulo.unique' => 'El :attribute ya está creado',
            'descripcion.required' => 'La :attribute es obligatorio'
        ];
    }
}
