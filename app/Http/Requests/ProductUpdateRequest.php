<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'price' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'image_id[]' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'descript' => 'required',
            'screen' => 'required',
            'os' => 'required',
            'back_camera' => 'required',
            'front_camera' => 'required',
            'ram' => 'required',
            'memory' => 'required',
            'battery_capacity' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Bạn chưa nhập tên'),
            'descript.required' => __('Bạn chưa nhập mô tả'),
            'screen.required' => __('Bạn chưa nhập màn hình'),
            'os.required' => __('Bạn chưa nhập hệ điều hành'),
            'back_camera.required' => __('Bạn chưa nhập camera sau'),
            'front_camera.required' => __('Bạn chưa nhập camera trước'),
            'ram.required' => __('Bạn chưa nhập ram'),
            'memory.required' => __('Bạn chưa nhập bộ nhớ'),
            'battery_capacity.required' => __('Bạn chưa nhập dung lượng pin'),
            'price.required' => __('Bạn chưa nhập giá'),
            'avatar.mimes' => __('Ảnh không đúng định dạng'),
            'avatar.max' => __('Ảnh tối đa 4MB'),
            'image_id[].mimes' => __('Ảnh không đúng định dạng'),
            'image_id[].max' => __('Ảnh tối đa 4MB'),
        ];
    }
}
