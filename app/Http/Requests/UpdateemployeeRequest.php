<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateemployeeRequest extends FormRequest
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
            'emp_name' => 'required',
            //'image' => 'required',
            'emp_NIC_no' => 'required',
            'emp_address' => 'required',
            'email_address' => 'required',
            'telephone_no' => 'required',
            'emp_access_level' => 'required',
        ];
    }
}
