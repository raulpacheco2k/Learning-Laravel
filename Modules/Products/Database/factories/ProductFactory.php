<?php

namespace Modules\Products\Database\Factories;

use App\Models\Brand;
use Modules\Products\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(255),
            'brand_id' => function () {
                return Brand::factory()->create()->id;
            },
            'stock' => $this->faker->numberBetween(0, 2147483647),
            'price' => $this->faker->numberBetween(0, 2147483647),
        ];
    }
}
