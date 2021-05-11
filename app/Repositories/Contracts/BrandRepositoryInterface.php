<?php


namespace App\Repositories\Contracts;


interface BrandRepositoryInterface
{
    public function all();

    public function find($id);
}