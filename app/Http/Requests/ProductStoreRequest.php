<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required', 
            'price' => 'required|numeric|min:1',
            'image_url' => 'required|mimes:jpg,png|max:2000',
            'desc' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên điện thoại không được để trống', 
            'price.required' => 'Giá điện thoại không được để trống', 
            'price.numeric' => 'Giá phải là số', 
            'price.min' => 'Giá phải lớn hơn hoặc bằng 1',
            'image_url.required' => 'Hình ảnh điện thoại không được để trống', 
            'image_url.mimes' => 'Hình ảnh phải định dạng jpg hoặc png', 
            'desc.required' =>  'Mô tả sản phẩm không được để trống'
        ];
    }
}
