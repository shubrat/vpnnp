<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return TRUE;
    }

    public function rules()
    {
        return [
              'title' => 'required|unique:sub_categories|max:22',
            'category_id' => 'required',


        ];
    }
}
