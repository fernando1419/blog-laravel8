<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $categories = Category::all();

      return view('admin.categories.index', compact('categories'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.categories.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $category = Category::create($request->validate([
         'name' => 'required',
         'slug' => 'required|unique:categories'
       ]));

      return redirect()->route('admin.categories.edit', $category)->with('info', 'Category created successfully!');
   }

   /**
    * Display the specified resource.
    *
    * @param  object  $category
    * @return \Illuminate\Http\Response
    */
   public function show(Category $category)
   {
      return view('admin.categories.show', compact('category'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  object  $category
    * @return \Illuminate\Http\Response
    */
   public function edit(Category $category)
   {
      return view('admin.categories.edit', compact('category'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $category
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Category $category)
   {
      $category->update($request->validate([
       'name' => 'required',
       'slug' => "required|unique:categories,slug,$category->id"
      ]));

      return redirect()->route('admin.categories.edit', $category)->with('info', 'Category updated successfully!');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  object  $category
    * @return \Illuminate\Http\Response
    */
   public function destroy(Category $category)
   {
      $category->delete();

      return redirect()->route('admin.categories.index')->with('info', 'Category has been deleted!');
   }
}
