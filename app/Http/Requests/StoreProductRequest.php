<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|string',
            'supplier_id' => 'required|string',
            'product_name' => 'required|string',
            'image' => 'required|image', 
            'category' => 'required|string',
            'brand' => 'required|string',
            'description' => 'required|string',
            'size' => 'required|string',
            'color' => 'required|string',
            'location' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
        ];
    }
}
