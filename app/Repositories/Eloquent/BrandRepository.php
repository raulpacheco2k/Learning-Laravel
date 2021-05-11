<?php


namespace App\Repositories\Eloquent;


use App\Models\Brand;
use App\Repositories\Contracts\BrandRepositoryInterface;

class BrandRepository extends AbstractRepository implements BrandRepositoryInterface
{
    public function model()
    {
        return Brand::class;
    }
}