@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   @can('admin.categories.create')
      <a href="{{ route('admin.categories.create') }}" class="btn btn-info btn-sm float-right">Add Category</a>
   @endcan
   <h2>List of Categories</h2>
@stop

@section('content')
   <div class="card">

      @include('admin.shared._session_message')
      <div class="card-body">
         <table class="table table-striped table-condensed">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>NAME</th>
                  <th colspan="2"></th>
               </tr>
            </thead>
            <tbody>
               @foreach ($categories as $category)
                  <tr>
                     <td> {{ $category->id }} </td>
                     <td> {{ $category->name }} </td>
                     <td width="10px">
                        @can('admin.categories.edit')
                           <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary btn-sm">Edit</a>
                        @endcan
                     </td>
                     <td width="10px">
                        @can('admin.categories.destroy')
                           <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                           </form>
                        @endcan
                     </td>
                  </tr>
               @endforeach

            </tbody>
         </table>
      </div>
   </div>
@stop

