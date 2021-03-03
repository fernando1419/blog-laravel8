<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role; // created with spatie installation

class RoleController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $roles = Role::all();

      return view('admin.roles.index', compact('roles'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $permissions = Permission::all();

      return view('admin.roles.create', compact('permissions'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $request->validate([
         'name' => 'required',
      ]);

      $role = Role::create($request->all());

      $role->permissions()->sync($request->permissions);

      return redirect()->route('admin.roles.edit', $role)->with('info', 'Role created successfully');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show(Role $role)
   {
      return view('admin.roles.show', $role);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit(Role $role)
   {
      $permissions = Permission::all();

      return view('admin.roles.edit', compact('role', 'permissions'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Role $role)
   {
      $request->validate([
         'name' => 'required',
      ]);

      $role->update($request->all());

      $role->permissions()->sync($request->permissions);

      return redirect()->route('admin.roles.edit', $role)->with('info', 'Role updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(Role $role)
   {
      $role->delete();

      return redirect()->route('admin.roles.index')->with('info', 'Role deleted successfully');
   }
}
