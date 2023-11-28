<?php

namespace App\Http\Requests;

use App\Models\Product;
use App\Rules\UniqueSku;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'price' => 'required|numeric|min:0',
            'count' => 'required|numeric|min:0',
            'desc' => 'required|min:10|max:3000',
            'sku' =>  ['required', 'min:3', 'max:10', new UniqueSku()],
        ];
    }

    public function messages()
    {
        return [
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.',
            'count.required' => 'The count field is required.',
            'count.integer' => 'The count must be an integer.',
            'count.min' => 'The count must be at least 0.',
            'desc.required' => 'The description field is required.',
            'desc.min' => 'The description must be at least 10 characters.',
            'desc.max' => 'The description may not be greater than 3000 characters.',
            'sku.required' => 'The SKU field is required.',
            'sku.min' => 'The SKU must be exactly 3 characters.',
            'sku.unique' => 'The SKU has already been taken.',
        ];
    }
}
