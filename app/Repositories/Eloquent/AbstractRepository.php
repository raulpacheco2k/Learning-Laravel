<?php


namespace App\Repositories\Eloquent;


use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    abstract public function model();

    protected function resolveModel()
    {
        return app($this->model());
    }

    public function all()
    {
        return $this->resolveModel()->all();
    }

    public function find(int $id)
    {
        return $this->resolveModel()->find($id);
    }

    public function insert(Model $object)
    {
        return $this->resolveModel()->insert($object->toArray());
    }

    public function delete(int $id)
    {
        return $this->resolveModel()->find($id)->delete($id);
    }
}