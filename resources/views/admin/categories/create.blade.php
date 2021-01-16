@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <h1>Create Category</h1>
@stop

@section('content')

   <div class="card">

      <div class="card-body">

         {!! Form::open(['route' => 'admin.categories.store']) !!}

            @include('admin.categories._form', ['submitButtonText' => 'Create Category'])

         {!! Form::close() !!}

      </div>

   </div>
@stop

@section('js')
   @include('admin.shared._slug_creator')
@endsection
