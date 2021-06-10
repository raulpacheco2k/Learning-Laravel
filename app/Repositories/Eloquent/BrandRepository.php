<?php

namespace App\Repositories\Eloquent;

use App\Models\Brand;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class BrandRepository.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class BrandRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Brand::class;
    }
}
