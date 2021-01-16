<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('posts', function (Blueprint $table)
      {
         $table->id();
         $table->string('name');
         $table->string('slug');

         $table->text('extract')->nullable();
         $table->longText('body')->nullable();

         $table->smallInteger('status')->default(1); // 1=Draft; 2=Published

         $table->unsignedBigInteger('user_id');
         $table->unsignedBigInteger('category_id');

         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
         $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('posts');
   }
}
