@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <h1>Create new Post</h1>
@stop

@section('content')

   @include('admin.shared._session_message')

   <div class="card">

      <div class="card-body">

         {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}

            {!! Form::hidden('user_id', auth()->user()->id) !!}

            @include('admin.posts._form', ['submitButtonText' => 'Create Post'])

         {!! Form::close() !!}

      </div>

   </div>
@stop

@section('css')
   <style>
      .image-wrapper {
         position: relative;
         padding-bottom: 56.25%
      }

      .image-wrapper img {
         position: absolute;
         object-fit: cover;
         width: 100%;
         height: 100%;
      }
   </style>
@endsection

@section('js')
   @include('admin.shared._slug_creator')
   @include('admin.shared._ckeditor_and_photoViewer')
@endsection

