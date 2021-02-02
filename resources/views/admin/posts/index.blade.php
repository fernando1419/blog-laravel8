@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <a href="{{ route('admin.posts.create') }}" class="btn btn-info btn-sm float-right">New Post</a>

   <h1>Posts Lists</h1>
@stop

@section('content')

   @include('admin.shared._session_message')

   @livewire('admin.posts-list')

@stop
