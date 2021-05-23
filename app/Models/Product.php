<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'brand_id', 'description', 'stock', 'price'];

    public static function rules()
    {
        return [
            'name' => 'required|max:255',
            'slug' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric'
        ];
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2, ',', '.');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
}