<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $posts = Post::factory(150)->create();

      foreach ($posts as $post) {
         // creates an image for each post
         Image::factory(1)->create([
         'imageable_id'   => $post->id,
         'imageable_type' => Post::class
       ]);
         // creates 2 random tags for each post
         $post->tags()->attach([
     rand(1, 5),
     rand(6, 10)
    ]);
      }
   }
}
