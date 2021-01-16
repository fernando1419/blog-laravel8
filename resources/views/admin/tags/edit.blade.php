@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <h1>Edit Tag</h1>
@stop

@section('content')

   <div class="card">

      @include('admin.shared._session_message')

      <div class="card-body">

         {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'PUT']) !!}

            @include('admin.tags._form', ['submitButtonText' => 'Update Tag'])

         {!! Form::close() !!}

      </div>

   </div>

@stop

@section('js')
   @include('admin.shared._slug_creator')
@endsection
