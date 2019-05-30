<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintenanceRequest extends FormRequest
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
            'description' => 'required',
            'device_id' => 'required',
            'time_start' => 'required|date',
            'cost' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Cần phải mô tả nghiệp vụ này',
            'device_id.required' => 'Nghiệp vụ phải có thiết bị',
            'time_start.required' => 'Ngày k được bỏ trống',
            'time_start.date' => 'Ngày chưa đúng định dạng',
            'cost.required' => 'Phải có giá sửa chữa',
            'cost.numeric' => 'Giá phải là số',
            'cost.min' => 'Giá phải lớn hơn 0',
        ];
    }
}
