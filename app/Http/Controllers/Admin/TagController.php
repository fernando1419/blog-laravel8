<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
   public function __construct()
   {
      $this->middleware('can:admin.tags.index')->only('index');
      $this->middleware('can:admin.tags.create')->only('create', 'store');
      $this->middleware('can:admin.tags.edit')->only('edit', 'update');
      $this->middleware('can:admin.tags.destroy')->only('destroy');
   }

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $tags = Tag::all();

      return view('admin.tags.index', compact('tags'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $colors = $this->getColors();

      return view('admin.tags.create', compact('colors'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $tag = Tag::create($request->validate([
   'name'  => 'required',
   'slug'  => 'required|unique:tags',
   'color' => 'required',
   ]));

      return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'Tag created successfully!');
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  object $tag
    * @return \Illuminate\Http\Response
    */
   public function edit(Tag $tag)
   {
      $colors = $this->getColors();

      return view('admin.tags.edit', compact('tag', 'colors'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  object $tag
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Tag $tag)
   {
      $tag->update($request->validate([
   'name' => 'required',
   'slug' => "required|unique:tags,slug,$tag->id"
   ]));

      return redirect()->route('admin.tags.edit', $tag)->with('info', 'Tag updated successfully!');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  object $tag
    * @return \Illuminate\Http\Response
    */
   public function destroy(Tag $tag)
   {
      $tag->delete();

      return redirect()->route('admin.tags.index')->with('info', 'Tag deleted successfully!');
   }

   /**
    * Return colors
    *
    * @return void
    */
   protected function getColors()
   {
      return [
   'red'    => 'red',
   'yellow' => 'yellow',
   'green'  => 'green',
   'blue'   => 'blue',
   'purple' => 'purple',
   'pink'   => 'pink',
   'indigo' => 'indigo'
   ];
   }
}
