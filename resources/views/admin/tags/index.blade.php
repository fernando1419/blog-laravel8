@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <h2>List of tags</h2>
@stop

@section('content')

   <div class="card">

      @include('admin.shared._session_message')

      <div class="card-header">
         <a href="{{ route('admin.tags.create') }}" class="btn btn-secondary btn-sm float-right">Add Tag</a>
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
               @foreach ($tags as $tag)
                  <tr>
                     <td> {{ $tag->id }} </td>
                     <td> {{ $tag->name }} </td>
                     <td width="10px">
                        <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-primary btn-sm">Edit</a>
                     </td>
                     <td width="10px">
                        <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
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

