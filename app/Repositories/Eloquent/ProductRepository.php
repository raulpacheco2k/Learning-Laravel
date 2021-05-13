<?php


namespace App\Repositories\Eloquent;


use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository extends AbstractRepository implements ProductRepositoryInterface
{
    public function model()
    {
        return Product::class;
    }
}