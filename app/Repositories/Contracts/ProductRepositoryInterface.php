<?php


namespace App\Repositories\Contracts;


interface ProductRepositoryInterface
{
    public function all();

    public function find($id);

    public function insert($array);

    public function delete($id);
}