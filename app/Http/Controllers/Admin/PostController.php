<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
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
      return view('admin.posts.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
   }

   /**
    * Display the specified resource.
    *
    * @param  object $post
    * @return \Illuminate\Http\Response
    */
   public function show(Post $post)
   {
      return view('admin.posts.show', compact('post'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  object $post
    * @return \Illuminate\Http\Response
    */
   public function edit(Post $post)
   {
      return view('admin.posts.edit', compact('post'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  object $post
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Post $post)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  object $post
    * @return \Illuminate\Http\Response
    */
   public function destroy(Post $post)
   {
      //
   }
}
