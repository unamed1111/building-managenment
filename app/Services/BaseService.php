<?php

namespace App\Services;
use Schema;

class BaseService
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAll($relations = [])
    {
        return $this->model->with($relations)->get();
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

    public function search($data,$relations = [])
    {
        // return $this->model::search($data->search)->get()->load($relations);
        $fields = Schema::getColumnListing($this->model->getTable());
        $results = $this->model->with($relations);
        foreach ($fields as $value) {
            $results = $results->where($value,'LIKE','%'.$data->search.'%','or');
        }
        return $results->get();
    }
}