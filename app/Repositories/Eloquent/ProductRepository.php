<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProductRepository.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ProductRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Product::class;
    }
}
