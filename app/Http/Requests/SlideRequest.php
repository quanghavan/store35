<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'avatar' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Bạn chưa nhập tên'),
            'avatar.required' => __('Bạn chưa nhập ảnh'),
            'avatar.mimes' => __('Không đúng định dạng ảnh'),
            'avatar.max' => __('Ảnh tối đa 4MB'),
        ];
    }
}
