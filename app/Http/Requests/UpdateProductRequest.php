<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'supplier_id' => 'required',
            'product_name' => 'required',
            'image' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'size' => 'required',
            'color' => 'required',
            'price' => 'required',
        ];
    }
}
