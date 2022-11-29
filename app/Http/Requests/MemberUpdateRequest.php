<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'name'=> 'required',
            'designation'=> 'required|max:100',
            'about'=> 'required',
            'twitter'=> 'sometimes|url',
            'facebook'=> 'sometimes|url',
            'instagram'=> 'sometimes|url',
            'image_url' => 'sometimes',

        ];
    }
}
