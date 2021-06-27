<?php

namespace App\Services;


use Illuminate\Http\Request;

class ImageService
{
    public function saveImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $request->merge(['image' => $request->file('image')->store('products')]);
        }
    }
}