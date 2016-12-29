@extends('app')
@section('content')
<div class="box box-primary">
  <div class="row">
    <div class="col-lg-12">
      <div class="box-header with-border box-title">
        <h3>Create New Permission</h3>
      </div>
      <div class="box-body">
      @if ($errors->any())
      <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      @endif
      {!! Form::open(['url' => 'permission', 'class' => 'form-horizontal', 'permission' => 'form']) !!}
      {{ csrf_field() }}
      @include('permission.form')
      <div class="form-group">
        <div class="col-md-2 col-md-offset-2">
      {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        </div>
      </div>
      {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@stop
