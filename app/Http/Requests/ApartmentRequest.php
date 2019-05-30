<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use App\Rules\CheckApartmentOwnerId;
class ApartmentRequest extends FormRequest
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
            'floor' => 'numeric|required',
            'building_id' => 'required',
            'acreage' => 'numeric|required',
            'phone' => 'numeric',
        ];
    }

    public function messages()
    {
        return [
            'floor.numeric' => 'Tầng phải là số',
            'name.required' => 'Bạn chưa tên căn hộ',
            'floor.required' => 'Bạn chưa điền tầng',
            'building_id.required' => 'Bạn chưa chọn tòa nhà',
            'acreage.required' => 'Bạn chưa điền diện tích',
            'acreage.numeric' => 'Diện tích phải là số',
            'phone.numeric' => 'số điện thoại phải là số',
        ];
    }
}
