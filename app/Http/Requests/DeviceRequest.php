<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceRequest extends FormRequest
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
            'supplier' => 'required',
            'purchase_date' => 'required',
            'floor' => 'required|numeric|min:1',
            'building_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên tòa nhà không được bỏ trống',
            'supplier.required' => 'Tên nhà cung câp không được bỏ trống',
            'purchase_date.required' => 'Ngày mua không được bỏ trống',
            'floor.required' => 'Phải có tầng sở hữu thiết bị',
            'floor.numeric' => 'tầng phải là số',
            'floor.min' => 'Không có tầng này',
            'building_id.required' => 'Phải chọn tòa nhà sở hữu',
        ];
    }
}
