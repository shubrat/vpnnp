<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            Rule::unique('blogs', 'title')->ignore($this->blog->id),
            'content' => 'required',
            'tags' => 'required',
            'is_featured' => 'bool|nullable',
            'source_url' => 'nullable',
            'source' => 'nullable',
            'image_url' => 'sometimes'
        ];
    }
}
