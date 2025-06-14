<?php

namespace App\Http\Requests\Brands;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends FormRequest
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
        //  dd($this->brand->id);
        // dd($this->request);
        $rules = [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'status' => [
                'required',
                'integer',
                'in:0,1',
            ],
            'slug' => [
                'required',    
                'string',
                'max:255',      // here category means model
                Rule::unique('brands')->ignore($this->brand->id),
            ],
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'slug.required' => 'The slug field is required.',
            'slug.unique' => 'The slug has already been taken.',
            'status.required' => 'The status field is required.',
            'status.integer' => 'The status must be an integer.',
            'status.in' => 'The status must be Active or Block.',
        ];
    }
}
