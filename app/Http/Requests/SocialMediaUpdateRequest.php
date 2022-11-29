<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialMediaUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'facebook' => 'required',
            'twitter' => 'sometimes',
            'instagram' => 'sometimes',
            'linkedin' => 'sometimes',
            'youtube' => 'sometimes',
        ];
    }
}
