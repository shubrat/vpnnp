<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerStoreRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [

            'name' => 'required|unique:partners,name',
            'url' => 'sometimes|url',
            //
        ];
    }
}
