@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <h1>Posts Lists</h1>
@stop

@section('content')
   @livewire('admin.posts-list')
@stop
