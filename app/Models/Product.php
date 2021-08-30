<?php

namespace App\Models;

use App\Scopes\ActiveStatusScope;
use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $perPage = 20;
    protected $fillable = ['name', 'category_id', 'description', 'price', 'sale_price',
        'quantity', 'width', 'height', 'weight', 'length', 'image_path', 'slug'];


    public static function booted()
    {
        //can do this in scope Folder
//        static::addGlobalScope('active',function (Builder $builder){
//            $builder->where('products.status','=','active');
//        });
//    static::addGlobalScope(new ActiveStatusScope());
    }

    public function scopeActive(Builder $builder)
    {
        $builder->where('products.status', '=', 'active');
    }

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
            'image' => 'nullable|image'
        ];

    }

    public function getImageUrlAttribute()
    {

        if (!$this->image_path) {
            return asset('/img/default_product.png');
        }
        if (stripos($this->image_path, 'http') === 0) {

            return $this->image_path;
        }
        return asset('uploads/' . $this->image_path);
    }

    public function setNameAttribute($value)
    {

        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['name'] = Str::title($value);
    }

    public function getFormattedPriceAttribute()
    {

        return Money::USD($this->price);
    }
}
