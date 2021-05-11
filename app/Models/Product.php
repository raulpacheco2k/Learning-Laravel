<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'brand_id', 'description', 'stock', 'price'];

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'slug' => 'required',
            'brand_id' => 'required',
            'price' => 'required|max:255'
        ];
    }

    public function getFormattedPriceAttribute(){
        return number_format($this->price, 2, ',', '.');
    }

}