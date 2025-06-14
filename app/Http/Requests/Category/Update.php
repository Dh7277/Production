<?php

namespace App\Http\Requests\Category;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
    public function rules()
    {
        $rules = [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            
            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048',
            ],
            'status' => [
                'required',
                'integer',
                'in:0,1',
            ]
        ];

        // if($this->getMethod() == "POST"){
        //     $rules += [
        //         'slug' => [
        //             'required',
        //             'unique:categories',
        //         ],
        //     ];
        // }

        if($this->getMethod() == "PUT"){
            $rules += [
                'slug' => [
                    'required',          // here category means model
                    Rule::unique('categories')->ignore($this->category->id),
                ],
            ];
        } 

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
            'status.in' => 'The status must be 0 or 1.',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg',
            'image.max' => 'The image size must not exceed 2MB',
            // Add other custom messages as needed
        ];
    }
}
