<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email', 
            'birthday' => 'required', 
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống', 
            'email.required' => 'Email không được để trống', 
            'email.email' => 'Email phải đúng định dạng', 
            'email.unique' => 'Email đã tồn tại vui lòng chọn email khacs', 
            'password.required' => 'Mật khẩu mới không được để trống',
            'password_confirm.required' => 'Mật khẩu xác nhận không được để trống',
            'password_confirm.same' => 'Mật khẩu xác nhận không khớp'
        ];
    }

    
}
