@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <h1>Create new Post</h1>
@stop

@section('content')
      <div class="card">

      <div class="card-body">

         {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}

            {{-- @include('admin.categories._form', ['submitButtonText' => 'Create Category']) --}}
            {!! Form::hidden('user_id', auth()->user()->id) !!}

            <div class="form-group">
               {!! Form::label('name', 'Name:') !!}
               {!! Form::text('name', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Enter post name']) !!}
               @error('name')
                  <span class="text-sm text-danger"> {{ $errors->first('name') }} </span>
               @enderror
            </div>

            <div class="form-group">
               {!! Form::label('slug', 'Slug:') !!}
               {!! Form::text('slug', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Enter name of slug', 'readonly']) !!}
               @error('slug')
                  <span class="text-sm text-danger"> {{ $errors->first('slug') }} </span>
               @enderror
            </div>

            <div class="form-group">
               {!! Form::label('category_id', 'Category:') !!}
               {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
               @error('category_id')
                  <span class="text-sm text-danger"> {{ $errors->first('category_id') }} </span>
               @enderror
            </div>

            <div class="form-group">
               <p class="font-weight-bold">Tags:</p>
               @foreach ($tags as $tag)
                     <label class="mr-3 text-sm"> <!-- usa label para poder seleccionar el check haciendo click en el label -->
                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                        {{ $tag->name }}
                     </label>
               @endforeach

               @error('tags')
                  <br/>
                  <span class="text-sm text-danger"> {{ $errors->first('tags') }} </span>
               @enderror
            </div>

            <div class="form-group">
               <p class="font-weight-bold">Status</p>
               <label class="mr-3 text-sm"> <!-- usa label para poder seleccionar el check haciendo click en el label -->
                  {!! Form::radio('status', 1, true) !!}
                  Draft
               </label>
               <label class="mr-3 text-sm"> <!-- usa label para poder seleccionar el check haciendo click en el label -->
                  {!! Form::radio('status', 2) !!}
                  Published
               </label>

               @error('status')
                  <span class="text-sm text-danger"> {{ $errors->first('status') }} </span>
               @enderror
            </div>

            <div class="row mb-3">
               <div class="col">
                  <div class="image-wrapper">
                     <img id="post-image" src="https://via.placeholder.com/300x200?text=No+Image+Uploaded+Yet+..." class="img-fluid">
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                    <label for="file">Post image:</label>
                    <input type="file" accept="image/*" name="file" id="file" class="form-control-file" placeholder="file" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Only image file types are supported (bmp, png, jpg, etc.)</small>
                    @error('file')
                       <span class="text-sm text-danger"> {{ $errors->first('file') }} </span>
                    @enderror
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus debitis quam neque perspiciatis nisi laboriosam, consectetur reiciendis est doloribus, pariatur id mollitia, autem deleniti similique voluptatibus fugiat? Quisquam, nulla cumque?</p>
               </div>
            </div>

            <div class="form-group">
               {!! Form::label('extract', 'Extract:') !!}
               {!! Form::textarea('extract', null, ['class' => 'form-control form-control-sm', 'rows' => 5]) !!}

               @error('extract')
                  <span class="text-sm text-danger"> {{ $errors->first('extract') }} </span>
               @enderror
            </div>

            <div class="form-group">
               {!! Form::label('body', 'Body:') !!}
               {!! Form::textarea('body', null, ['class' => 'form-control form-control-sm', 'rows' => 5]) !!}

               @error('body')
                  <span class="text-sm text-danger"> {{ $errors->first('body') }} </span>
               @enderror
            </div>

            <div class="text-right">
               {!! Form::submit('Create Post', ['class' => 'btn btn-sm btn-info']) !!}
            </div>

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

   <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
   <script>
      ClassicEditor
         .create( document.querySelector( '#extract' ) )
         .catch( error => {
            console.error( error );
         });
      ClassicEditor
         .create( document.querySelector( '#body' ) )
         .catch( error => {
            console.error( error );
         });

      document.getElementById("file").addEventListener('change', changeImage);

      function changeImage(event){
         var file = event.target.files[0];
         var reader = new FileReader();
         reader.onload = (event) => {
            document.getElementById("post-image").setAttribute('src', event.target.result);
         };
         reader.readAsDataURL(file);
      }
   </script>

@endsection

