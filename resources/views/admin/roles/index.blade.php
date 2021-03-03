@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <a href="{{ route('admin.roles.create') }}" class="btn btn-info btn-sm float-right">Add Role</a>

   <h2>List of Roles</h2>
@stop

@section('content')

   @include('admin.shared._session_message')
      
   <div class="card">

      <div class="card-body">

         <table class="table table-striped table-condensed">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Role</th>
                  <th colspan="2"></th>
               </tr>
            </thead>
            <tbody>
               @foreach ($roles as $role)
                  <tr>
                     <td> {{ $role->id }} </td>
                     <td> {{ $role->name }} </td>
                     <td width="10px">
                        {{-- @can('admin.roles.edit') --}}
                           <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-primary btn-sm">Edit</a>
                        {{-- @endcan --}}
                     </td>
                     <td width="10px">
                        {{-- @can('admin.roles.destroy') --}}
                           <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                           </form>
                        {{-- @endcan --}}
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
   
      </div>

   </div>

@stop
