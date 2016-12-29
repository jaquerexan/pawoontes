@extends('app')
@section('content')
<div class="box box-primary">
  <div class="row">
    <div class="col-lg-12">
      <div class="box-header with-border box-title">
        <h3>Edit Password</h3>
      </div>
      <div class="box-body">
      @if ($errors->any())
      <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      @endif
      {!! Form::model($user, ['route' => ['user.change', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form']) !!}
      {{ csrf_field() }}
      @include('user.form-company')
      @include('auth.register-form')
      <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
      {!! Form::submit('Change Password', ['class' => 'btn btn-primary']) !!}
        </div>
      </div>
      {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@stop