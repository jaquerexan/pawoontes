<div class="form-group{{ $errors->has('uuid') ? ' has-error' : '' }}">
  {!! Form::label('uuid', 'uuid', ['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-10">
    {!! Form::text('uuid', $hashuuid, ['class' => 'form-control', 'placeholder' => '', 'readOnly' => true]) !!}
    @if ($errors->has('uuid'))
      <span class="help-block">
        <strong>{{ $errors->first('uuid') }}</strong>
      </span>
    @endif
  </div>
</div>
<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
  {!! Form::label('nama', 'Name', ['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-10">
    {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => '']) !!}
    @if ($errors->has('nama'))
      <span class="help-block">
        <strong>{{ $errors->first('nama') }}</strong>
      </span>
    @endif
  </div>
</div>
<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
  {!! Form::label('alamat', 'Alamat', ['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-10">
  	{!! Form::textArea('alamat', null, ['class' => 'form-control', 'placeholder' => '']) !!}
    @if ($errors->has('alamat'))
      <span class="help-block">
        <strong>{{ $errors->first('alamat') }}</strong>
      </span>
    @endif
  </div>
</div>
