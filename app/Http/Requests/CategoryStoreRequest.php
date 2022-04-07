<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'desc' => 'required'
        ];
    } 
    
    /**
     * 
     */ 
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không để trống', 
            'desc.required' => 'Cần 1 vài mô tả về danh mục'
        ];
    }
}
