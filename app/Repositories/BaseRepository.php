<?php

namespace App\Repositories;

use App\Contracts\BaseContract;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseContract {

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    public function add(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete(int $id)
    {
        return $this->model->destroy($id);
    }

}