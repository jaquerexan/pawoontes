<div class="form-group{{ $errors->has('cmp_id') ? ' has-error' : '' }}">
  {!! Form::label('cmp_id', 'Company', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
  	@if(isset($user->id))
	    @if(isset($editpass))
		    {!! Form::select('cmp_id', $companylist, $companyuser->cmp_id, ['class' => 'form-control', 'placeholder' => 'select company', 'readonly' => 'true', 'disabled' => 'true']) !!}
		@else
			{!! Form::select('cmp_id', $companylist, $companyuser->cmp_id, ['class' => 'form-control', 'placeholder' => 'select company']) !!}
	    @endif
  	@else
	    {!! Form::select('cmp_id', $companylist, null, ['class' => 'form-control', 'placeholder' => 'select company']) !!}
  	@endif
    @if ($errors->has('cmp_id'))
      <span class="help-block">
        <strong>{{ $errors->first('cmp_id') }}</strong>
      </span>
    @endif
  </div>
</div>