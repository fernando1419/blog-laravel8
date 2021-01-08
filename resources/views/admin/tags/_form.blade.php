<div class="form-group">
   {!! Form::label('name', 'Name:') !!}
   {!! Form::text('name', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Enter category name']) !!}
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
   {!! Form::label('color', 'Color:') !!}
   {!! Form::select('color', $colors, 'indigo', ['class' => 'form-control']) !!}
   @error('color')
      <span class="text-sm text-danger"> {{ $errors->first('color') }} </span>
   @enderror
</div>

<div class="text-right">
   {!! Form::submit($submitButtonText, ['class' => 'btn btn-sm btn-info']) !!}
</div>
