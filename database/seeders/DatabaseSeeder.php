<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    *
    * @return void
    */
   public function run()
   {
      Storage::deleteDirectory('posts'); // this is for erasing existing images.
      Storage::makeDirectory('posts');

      $this->call(RoleSeeder::class);

      $this->call(UserSeeder::class);
      \App\Models\Category::factory(5)->create();
      \App\Models\Tag::factory(10)->create();
      $this->call(PostSeeder::class);
   }
}
