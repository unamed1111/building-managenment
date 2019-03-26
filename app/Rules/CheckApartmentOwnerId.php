<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\ApartmentOwner;

class CheckApartmentOwnerId implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $apartmentOwnerId
     * @param  mixed  $value
     * @return bool
     */
    public function passes($apartmentOwnerId, $value)
    {
        return ApartmentOwner::find($value) !== null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Mã chủ sở hữu không tồn tại';
    }
}
