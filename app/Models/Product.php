<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'description', 'price', 'sale_price',
        'quantity', 'width', 'height', 'weight', 'length', 'image_path','slug'];

    public static function validate()
    {
        return [
            'name' => 'required|string|max:255|min:2|unique:products,id',
            'category_id' => 'nullable|int|exists:categories,id',
            'description' => 'nullable|min:5',
            'price' => 'nullable|numeric',
            'sale_price' => 'nullable|numeric',
            'quantity' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'image_path' => 'nullable|image'
        ];

    }
}
