@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <h1>Create new Role</h1>
@stop

@section('content')

   @include('admin.shared._session_message')
   
   <div class="card">

      <div class="card-body">

         {!! Form::open(['route' => 'admin.roles.store']) !!}

            @include('admin.roles._form', ['submitButtonText' => 'Create Role'])

         {!! Form::close() !!}

      </div>

   </div>

@stop