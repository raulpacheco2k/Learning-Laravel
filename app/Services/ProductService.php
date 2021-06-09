<?php

namespace App\Services;


use App\Http\Requests\ProductRequest;

class ProductService
{
    public function saveImage(ProductRequest $request)
    {
        if ($request->hasFile('image')) {
            $request->merge(['image' => $request->file('image')->store('products')]);
        }
    }
}