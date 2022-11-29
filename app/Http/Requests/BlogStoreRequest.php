<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|unique:blogs,title',
            'content' => 'required',
            'tags' => 'required',
            'is_featured' => 'bool|nullable',
            'source_url' => 'required|url',
            'source' => 'nullable',
            'image_url' => 'required'
        ];
    }
}
