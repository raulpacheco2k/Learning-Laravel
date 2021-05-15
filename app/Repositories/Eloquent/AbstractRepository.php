<?php


namespace App\Repositories\Eloquent;


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

    public function find($id)
    {
        return $this->resolveModel()->find($id);
    }

    public function insert($array)
    {
        return $this->resolveModel()->insert($array);
    }

    public function delete($id)
    {
        return $this->resolveModel()->find($id)->delete($id);
    }
}