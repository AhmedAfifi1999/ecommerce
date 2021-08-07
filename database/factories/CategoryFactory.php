<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status=['Active','draft'];
        $category = DB::table('categories')->inRandomOrder()->limit(1)->first(['id']);
        $name = $this->faker->words(2, true);
        return [
            'slug' => Str::slug($name),
            'name' => $name,
            'parent_id' => $category ? $category->id : null,
            'description' => $this->faker->words(200, true),
            'image_path' => $this->faker->imageUrl(),
            'status' => $status[rand(0,1)]
        ];
    }
}
