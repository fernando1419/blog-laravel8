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
         @isset ($post->image)
             <img id="post-image" src="{{ Storage::url($post->image->url) }}" class="img-fluid">
         @else
            <img id="post-image" src="https://via.placeholder.com/300x200?text=No+Image+Uploaded+Yet+..." class="img-fluid">
         @endisset
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
   {!! Form::submit($submitButtonText , ['class' => 'btn btn-sm btn-info']) !!}
</div>
