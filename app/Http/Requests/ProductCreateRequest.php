<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'product_name' => 'required|max:255',
            'product_category' => 'required',
            'product_price' => 'required|numeric',
            'product_qty' => 'required|numeric',
            'product_image' => 'required',
            'product_left_image' => 'required',
            'product_right_image' => 'required',
            'product_front_image' => 'required',
            'product_back_image' => 'required',
            'product_description' => 'required',
            'product_color' => 'required',
        ];
    }
}
