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
            'titulo' => 'required',
            'descripcion' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El gdfg es obligatorio',
            // 'titulo.unique' => 'El gdfg ya está creado',
            'descripcion.required' => 'La gdfg es obligatorio'
        ];
    }
}
