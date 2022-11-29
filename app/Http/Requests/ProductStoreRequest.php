<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'sku' => 'required|unique:products,sku',
            'category_id' => 'required',
            'units' => 'required',
            'tags' => 'nullable',
            'image' => 'nullable',
            'gallery_image_url' => 'nullable',
            'cost_price' => 'required|numeric|gte:1',
            'selling_price' => 'required|numeric|gte:1',
            'quantity' => 'required',
            'description' => 'nullable',
        ];
    }
}
