<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SpecialServiceUpdateRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'title'       => 'required|max:199',
            // Rule::unique('special_services', 'title')->ignore($this->special_services->id),
            'description' => 'required',
            'image_url'   => 'nullable',
        ];
    }
}
