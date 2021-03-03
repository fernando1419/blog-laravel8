@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <h1>Create Tag</h1>
@stop

@section('content')

   @include('admin.shared._session_message')

   <div class="card">

      <div class="card-body">

         {!! Form::open(['route' => 'admin.tags.store']) !!}

            @include('admin.tags._form', ['submitButtonText' => 'Create Tag'])

         {!! Form::close() !!}

      </div>

   </div>
   
@stop

@section('js')
   @include('admin.shared._slug_creator')
@endsection
