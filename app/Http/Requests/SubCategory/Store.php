<?php

namespace App\Http\Requests\SubCategory;

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
        // dd($this->request);
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'slug' => [
                'required',
                'unique:sub_categories',
            ],
            'category' => [
                'required',
                'integer',
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
            'category.required' => 'The category field is required.',
        ];
    }
}