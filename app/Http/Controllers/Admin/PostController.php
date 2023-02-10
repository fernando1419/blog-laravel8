<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
   public function __construct()
   {
      $this->middleware('can:admin.posts.index')->only('index');
      $this->middleware('can:admin.posts.create')->only('create', 'store');
      $this->middleware('can:admin.posts.edit')->only('edit', 'update');
      $this->middleware('can:admin.posts.destroy')->only('destroy');
   }

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return view('admin.posts.index');
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $tags       = Tag::all();
      $categories = Category::pluck('name', 'id');

      return view('admin.posts.create', compact('categories', 'tags'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(PostRequest $request)
   {
      $post = Post::create($request->all());

      if ($request->file('file')) { // image exists in the request
         $url = Storage::put('posts', $request->file('file'));  // moves from temp location to public/storage/posts
         $post->image()->create(['url' => $url]);
      }

      if ($request->tags) {
         $post->tags()->attach($request->tags);
      }

      Cache::flush(); // delete existing cache.

      return redirect()->route('admin.posts.edit', $post)->with('info', 'Post created successfully');
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  object $post
    * @return \Illuminate\Http\Response
    */
   public function edit(Post $post)
   {
      $this->authorize('author', $post);

      $categories = Category::pluck('name', 'id');
      $tags       = Tag::all();

      return view('admin.posts.edit', compact('post', 'categories', 'tags'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  object $post
    * @return \Illuminate\Http\Response
    */
   public function update(PostRequest $request, Post $post)
   {
      $this->authorize('author', $post);

      $post->update($request->all());

      if ($request->file('file')) {
         $url = Storage::put('posts', $request->file('file'));

         if ($post->image) {
            Storage::delete($post->image->url); // delete existing image

            $post->image->update([
               'url' => $url
            ]);
         } else {
            $post->image()->create([
               'url' => $url
            ]);
         }
      }

      if ($request->tags) {
         $post->tags()->sync($request->tags);
      }

      Cache::flush();

      return redirect()->route('admin.posts.edit', $post)->with('info', 'Post updated succesfully');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  object $post
    * @return \Illuminate\Http\Response
    */
   public function destroy(Post $post)
   {
      $this->authorize('author', $post);

      $post->delete();

      Cache::flush();

      return redirect()->route('admin.posts.index')->with('info', 'Post deleted successfully!');
   }
}
