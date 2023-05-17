<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostApiRequest extends FormRequest
{
    public function  failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));

    }

}
