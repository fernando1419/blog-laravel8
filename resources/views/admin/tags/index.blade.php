@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   @can('admin.tags.create')
      <a href="{{ route('admin.tags.create') }}" class="btn btn-info btn-sm float-right">Add Tag</a>
   @endcan
   <h2>List of tags</h2>
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
               @foreach ($tags as $tag)
                  <tr>
                     <td> {{ $tag->id }} </td>
                     <td> {{ $tag->name }} </td>
                     <td width="10px">
                        @can('admin.tags.edit')
                           <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-primary btn-sm">Edit</a>
                        @endcan
                     </td>
                     <td width="10px">
                        @can('admin.tags.destroy')
                           <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
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

