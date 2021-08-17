<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
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
        $status = ['Active', 'draft'];
        $category = DB::table('categories')->inRandomOrder()->limit(1)->first(['id']);
        $name = $this->faker->words(2, true);
        return [
            'slug' => Str::slug($name),
            'name' => $name,
            'category_id' => $category ? $category->id : null,
            'description' => $this->faker->words(200, true),
            'image_path' => $this->faker->imageUrl(),
            'status' => $status[rand(0, 1)],
            'price' => $this->faker->numberBetween(10, 1111),
            'sale_price' => $this->faker->numberBetween(10, 1111),
            'quantity' => $this->faker->numberBetween(10, 10000),
            'width' => $this->faker->numberBetween(10, 60),
            'height' => $this->faker->numberBetween(10, 150),
            'weight' => $this->faker->numberBetween(10, 30),
            'length' => $this->faker->numberBetween(10, 100),
        ];
    }
}
