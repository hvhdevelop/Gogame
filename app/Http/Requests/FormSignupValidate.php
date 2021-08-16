<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormSignupValidate extends FormRequest
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
            'username' => 'required|min:6|max:32|unique:users',
            'password' => 'required|min:8|max:32',
            'password-confict' => 'same:password|required',
            'email' => 'required|email|unique:users',
            'firstname' => 'required|max:32',
            'lastname' => 'required|max:32',
            'checked'   => 'required'
        ];
    }
    public function messages(){
        return [
            // 'username.required' => 'Không được bỏ trống trường này'
            
        ];
    }
}