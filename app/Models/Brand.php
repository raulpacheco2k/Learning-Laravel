<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug','description'];

    public static function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required|max:255'
        ];
    }
}