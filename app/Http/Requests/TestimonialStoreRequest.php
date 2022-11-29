<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialStoreRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'name'=>'required|unique:testimonials',
            'position'=>'sometimes',
            'description'=>'required',
            'image'=>'sometimes'
        ];
    }
}
