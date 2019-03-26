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
            'apartment_owner_id' => [
                'required',
                new CheckApartmentOwnerId,
            ],

            'floor' => 'numeric|required',

        ];
    }

    public function messages()
    {
        return [
            'apartment_owner_id.required' => 'Mã chủ sở hữu không được bỏ trống',
            'floor.numeric' => 'Tầng phải là số',
        ];
    }
}
