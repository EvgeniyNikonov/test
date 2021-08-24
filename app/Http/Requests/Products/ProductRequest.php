<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name'              => 'required|min:3',
            'url'               => 'required',
            'sort'              => 'integer|nullable',
            'img'               => 'image|nullable',
            'brand_name'        => 'string|nullable',
            'inner_diameter'    => 'string|nullable',
            'external_diameter' => 'string|nullable',
            'width'             => 'string|nullable',
            'analogs'           => 'string|nullable',
            'weight'            => 'string|nullable',
            'description'       => 'string|nullable',
        ];
    }
}
