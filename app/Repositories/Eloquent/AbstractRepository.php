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

    public function find(int $id): Model
    {
        return $this->resolveModel()->find($id);
    }

    public function create(array $attributes): Model
    {
        return $this->resolveModel()->create($attributes);
    }

    public function update(array $attributes, $id): bool
    {
        return $this->find($id)->update($attributes);
    }

    public function delete(int $id): void
    {
        $this->resolveModel()->find($id)->delete($id);
    }
}