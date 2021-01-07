@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <h1>List of Categories</h1>
@stop

@section('content')
   <div class="card">

      @include('admin.categories._session_message')

      <div class="card-header">
         <a href="{{ route('admin.categories.create') }}" class="btn btn-secondary btn-sm">Add Category</a>
      </div>

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
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary btn-sm">Edit</a>
                     </td>
                     <td width="10px">
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                     </td>
                  </tr>
               @endforeach

            </tbody>
         </table>
      </div>
   </div>
@stop

