<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'user_name' => 'required',
            'title' => 'required',
            'email' => 'required|email',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => __('Bạn chưa nhập tên'),
            'title.required' => __('Bạn chưa nhập tiêu đề'),
            'email.required' => __('Bạn chưa nhập email'),
            'email.email' => __('Email bạn nhập không hợp lệ'),
            'content.required' => __('Bạn chưa nhập nội dung'),
        ];
    }
}
