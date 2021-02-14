<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
     * @return array
     */
    public $validator = null;

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }

    public function rules()
    {
        return [
                'name' => 'required',
                'price' => 'required',
                'category' => 'required',
                'description' => 'required|min:10',
                'image' => 'required|image|mimes:jpeg,png',
               // 'image' => 'required|max|image|mimes:jpeg,png',
        ];
    }

    public function messages()
    {
        return [
             'name.required' => __('msg.name required'),
                'price.required' =>  __('msg.price required'),
                'category.required' => __('msg.category required'),
                'description.required' => __('msg.description required'),
                'description.min' => __('msg.description min'),
                'image.required' => __('msg.image required'), 
                'image.max' => __('msg.image max'), 
                'image.image' => __('msg.image image'),
               
        ];
    }
}
