@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <h1>Edit Post</h1>
@stop

@section('content')

   @include('admin.shared._session_message')

   <div class="card">

      <div class="card-body">

         <p class="h5">Name:</p>

         <p class="form-control form-control-sm"> {{ $user->name }} </p>

         <h2 class="h5"> Roles List: </h2>

         {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
            @foreach ($roles as $role)
               <label class="mr-3 text-sm">
                  {!! Form::checkbox('roles[]', $role->id, null) !!}
                  {{ $role->name }}
               </label>
            @endforeach

            <div class="text-right">
               {!! Form::submit('Assign Role', ['class' => 'btn btn-info btn-sm mr-2']) !!}
            </div>

         {!! Form::close() !!}

      </div>

   </div>

@stop

