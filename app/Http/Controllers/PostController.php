<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $key = 'posts';

      if (request()->page) {
         $key = 'posts' . request()->page;
      }

      if (Cache::has($key)) {
         $posts = Cache::get($key);
      } else {
         $posts = Post::where('status', 2)->latest('id')->paginate(8);
         Cache::put($key, $posts);
      }

      return view('posts.index', compact('posts'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  object  $post
    * @return \Illuminate\Http\Response
    */
   public function show(Post $post)
   {
      $this->authorize('published', $post);

      $similarPosts = Post::where('category_id', $post->category_id)
                          ->where('status', 2)
                          ->where('id', '!=', $post->id)
                          ->latest('id')
                          ->take(4)
                          ->get();

      return view('posts.show', compact('post', 'similarPosts'));
   }

   /**
    * Returns posts of a category
    *
    * @param Category $category
    * @return void
    */
   public function category(Category $category)
   {
      $posts = Post::where('category_id', $category->id)
         ->where('status', 2)
         ->latest('id')
         ->paginate(6);

      return view('posts.category', compact('posts', 'category'));
   }

   /**
    * Returns posts of a tag.
    *
    * @param Tag $tag
    * @return void
    */
   public function tag(Tag $tag)
   {
      $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(4);

      return view('posts.tag', compact('posts', 'tag'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      //
   }
}
