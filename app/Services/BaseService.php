<?php

namespace App\Services;

class BaseService
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAll($relations = [])
    {
        return $this->model->with($relations)->paginate(10);
    }

    public function store($data)
    {
    	return $this->model->create($data);
    }

    public function get($id, $relations = [])
    {
        return $this->model->with($relations)->find($id);
    }

    public function update($data,$id)
    {
        $model = $this->get($id);
        return $model->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

}