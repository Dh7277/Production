<?php

namespace App\Http\Requests\Brands;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                'required',
                'unique:brands',
            ],
            'status' => [
                'required',
                'integer',
                'in:0,1',
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',

            'slug.required' => 'The slug field is required.',
            'slug.unique' => 'The slug has already been taken.',
            
            'status.required' => 'The status field is required.',
            'status.integer' => 'The status must be an integer.',
            'status.in' => 'The status must be 0 or 1.',
        ];
    }
}