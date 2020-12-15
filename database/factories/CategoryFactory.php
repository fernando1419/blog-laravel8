<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
      $name = $this->faker->unique()->word(20); // 20 chars max.

      return [
       'name' => $name,
       'slug' => Str::slug($name)
     ];
   }
}
