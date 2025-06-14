<?php

namespace App\Http\Requests\SubCategory;

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
        // dd($this->subCategory->id);
        // dd($this->request);

        $rules = [
            'category' => [
                'required',
                'integer',
                Rule::exists('categories', 'id'),
            ],
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
                Rule::unique('sub_categories')->ignore($this->subCategory->id),
            ],
        ];

        // if($this->getMethod() == "POST"){
        //     $rules += [
        //         'slug' => [
        //             'required',
        //             'unique:categories',
        //         ],
        //     ];
        // }

        // if($this->getMethod() == "PUT"){
        //     $rules += [
        //         'slug' => [
        //             'required',          // here category means model
        //             Rule::unique('categories')->ignore($this->category->id),
        //         ],
        //     ];
        // } 

        return $rules;
    }

    public function messages()
    {
        return [
            'category.exists' => 'The category does not exists.',
            'category.required' => 'The category field is required.',
            'name.required' => 'The name field is required.',
            'slug.required' => 'The slug field is required.',
            'slug.unique' => 'The slug has already been taken.',
            'status.required' => 'The status field is required.',
            'status.integer' => 'The status must be an integer.',
            'status.in' => 'The status must be Active or Block.',
            // Add other custom messages as needed
        ];
    }
}
