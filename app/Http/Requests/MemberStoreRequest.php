<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberStoreRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'name'=> 'required|unique:members,name',
            'designation'=> 'required|max:100',
            'about'=> 'required',
            'twitter'=> 'sometimes|url',
            'facebook'=> 'sometimes|url',
            'instagram'=> 'sometimes|url',
            'image_url' => 'required',
        ];
    }
}
