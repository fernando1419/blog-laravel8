@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <h1>Edit Role</h1>
@stop

@section('content')

   @include('admin.shared._session_message')
   
   <div class="card">

      <div class="card-body">

         {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT']) !!}

            @include('admin.roles._form', ['submitButtonText' => 'Update Role'])

         {!! Form::close() !!}

      </div>

   </div>

@stop