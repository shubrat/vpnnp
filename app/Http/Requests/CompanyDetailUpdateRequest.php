<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyDetailUpdateRequest extends FormRequest
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
            
            'address' => 'required',
            'secondAddress' => 'sometimes',
            'phone' => 'required|digits_between:9,15',
            'secondPhone' => 'sometimes',
            'email' => 'required|email',
            'secondEmail' => 'sometimes',
        ];
    }
}
