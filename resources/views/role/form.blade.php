<div class="form-group">
  {!! Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-10">
  @if(isset($role))
  {!! Form::text('name', null, ['class' => 'form-control', 'readonly' => 'true', 'disabled' => 'true']) !!}
  @else
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
  @endif
  </div>
</div>
<div class="form-group">
  {!! Form::label('display name', 'Display Name', ['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-10">
  	{!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
  </div>
</div>
<div class="form-group">
  {!! Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-10">
  	{!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => '']) !!}
  </div>
</div>
@include('role.form-roleuser')
@include('role.form-rolepermission')
