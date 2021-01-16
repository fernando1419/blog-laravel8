@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <h1>Edit Category</h1>
@stop

@section('content')
    <div class="card">

      @include('admin.shared._session_message')

      <div class="card-body">

         {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'PUT']) !!}

            @include('admin.categories._form', ['submitButtonText' => 'Update Category'])

         {!! Form::close() !!}

      </div>

   </div>
@stop

@section('js')
   @include('admin.shared._slug_creator')
@endsection

