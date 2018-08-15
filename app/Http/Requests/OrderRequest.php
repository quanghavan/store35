<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'address_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'address_id.required' => __('Bạn chưa chọn địa chỉ giao hàng'),
        ];
    }
}
