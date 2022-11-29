<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecialServiceStoreRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
            'title' => 'required|unique:special_services,title',
            'description' => 'required',
            'image_url'   => 'required',
        ];
    }
}
