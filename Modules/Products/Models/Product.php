<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'brand_id', 'description', 'stock', 'price', 'image'];

    public static $rules = [
        'name' => 'required|max:255',
        'slug' => 'required',
        'brand_id' => 'required',
        'price' => 'required|numeric'
    ];

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2, ',', '.');
    }

    public function getCreatedAttribute(): string
    {
        return date('H:i d/m/Y ', strtotime($this->created_at));
    }

    public function getUpdatedAttribute(): string
    {
        return date('H:i d/m/Y ', strtotime($this->created_at));
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
}