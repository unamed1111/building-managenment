<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'email' => 'email|unique:employees,email,' . $this->employee,
            'phone' => 'required|numeric',
            'dob' => 'required',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa điền tên nhân viên',
            'email.required' => 'Bạn chưa điền email',
            'email.unique' => 'Đã có người sử dụng email này',
            'dob.required' => 'Bạn chưa điền ngày sinh',
            'phone.required' => 'Bạn chưa điền số điện thoại',
            'address.required' => 'Bạn chưa điền địa chỉ',
            'phone.numeric' => 'số điện thoại phải là số',
        ];
    }
}
