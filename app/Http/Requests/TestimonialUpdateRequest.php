<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TestimonialUpdateRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

 
    public function rules()
    {
        return [
            'name'=>'required',
            Rule::unique('testimonials', 'name')->ignore($this->testimonial->id),
            'company'=>'sometimes',
            'description'=>'sometimes',
            'image'=>'sometimes'

        ];
    }
}
