<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResidentRequest extends FormRequest
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
            'email' => 'required|email|unique:residents,email,' . $this->resident,
            'phone' => 'required|numeric',
            'passport' => 'required|numeric',
            'dob' => 'required',
            'apartment_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa điền tên cư dân',
            'email.required' => 'Bạn chưa điền email',
            'email.unique' => 'Đã có người sử dụng email này',
            'email.email' => 'Phải là email',
            'dob.required' => 'Bạn chưa điền ngày sinh',
            'phone.required' => 'Bạn chưa điền số điện thoại',
            'passport.required' => 'Bạn chưa điền chưng minh thư',
            'apartment_id.required' => 'Bạn chưa chọn căn hộ sinh sống',
            'phone.numeric' => 'số điện thoại phải là số',
            'passport.numeric' => 'Chứng minh thư phải là số',
        ];
    }
}
