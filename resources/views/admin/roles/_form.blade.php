<div class="form-group">
   {!! Form::label('name', 'Name:') !!}
   {!! Form::text('name', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Enter Role name']) !!}
   @error('name')
      <span class="text-sm text-danger"> {{ $errors->first('name') }} </span>
   @enderror
</div>

<h2 class="h3"> List of Permissions</h2>

@foreach ($permissions as $permission)
   <div>
      <label>
          {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
          {{ $permission->description }}
      </label>
   </div>
@endforeach

<div class="text-right">
   {!! Form::submit($submitButtonText, ['class' => 'btn btn-sm btn-info']) !!}
</div>
