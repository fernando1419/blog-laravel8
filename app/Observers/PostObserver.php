<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
   /**
    * Handle the Post "created" event.
    *
    * @param  \App\Models\Post  $post
    * @return void
    */
   public function creating(Post $post)
   {
      if ( ! App::runningInConsole()) {
         $post->user_id = auth()->user()->id;
      }
   }

   /**
    * Handle the Post "updated" event.
    *
    * @param  \App\Models\Post  $post
    * @return void
    */
   public function updated(Post $post)
   {
      //
   }

   /**
    * Handle the Post "deleted" event.
    *
    * @param  \App\Models\Post  $post
    * @return void
    */
   public function deleting(Post $post)
   {
      if ($post->image) { // if post has an image
         Storage::delete($post->image->url);
      }
   }

   /**
    * Handle the Post "restored" event.
    *
    * @param  \App\Models\Post  $post
    * @return void
    */
   public function restored(Post $post)
   {
      //
   }

   /**
    * Handle the Post "force deleted" event.
    *
    * @param  \App\Models\Post  $post
    * @return void
    */
   public function forceDeleted(Post $post)
   {
      //
   }
}
