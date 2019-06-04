<?php

namespace App\Services;

use App\Models\Apartment;
use App\Models\Resident;
use Illuminate\Http\Request;
use App\Services\BaseService;

class ResidentService extends BaseService
{
    protected $model;

    public function __construct(Resident $resident)
    {
        parent::__construct($resident);
    }

    public function search($search)
    {
        $input = preg_quote($search, '~');
        $data = GENDER;
        $gender = preg_grep('~' . $input . '~', $data);
        $search = '%'.$search.'%';
        $apartment = Apartment::where('name', 'like', $search)->get()->pluck('id');
        $result = $this->model->where('name', 'like', $search)
                                ->orWhere('dob', 'like', $search)
                                ->orWhere('email', 'like', $search)
                                ->orWhere('phone', 'like', $search)
                                ->orWhereIn('gender', array_keys($gender))
                                ->orWhereIn('apartment_id', $apartment);

        return $result->paginate(10);
    }

    public function update($data,$id)
    {
        $model = $this->get($id);
        $model->update($data);
        if($model->user) {
            $model->user->update(['email' => $data['email']]);
        }
        return;
    }
}