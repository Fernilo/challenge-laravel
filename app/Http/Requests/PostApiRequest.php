<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StorePostApiRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostApiRequest extends StorePostRequest
{
    // public function  failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([
    //         'success'   => false,
    //         'message'   => 'Validation errors',
    //         'data'      => $validator->errors()
    //     ]));

    // }

}
