{!! Form::hidden('id', null, ['class' => 'form-control']) !!}
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Name</label>

    <div class="col-md-6">
        @if(isset($user))
            @if(isset($editpass))
                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" disabled="true" readonly="true" required autofocus>
                {!! Form::hidden('editpass', $editpass, ['class' => 'form-control']) !!}
            @else
                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                {!! Form::hidden('editpass', null, ['class' => 'form-control']) !!}
            @endif
        @else
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            {!! Form::hidden('editpass', null, ['class' => 'form-control']) !!}
        @endif

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

    <div class="col-md-6">
        @if(isset($user))
            @if(isset($editpass))
                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled="true" readonly="true" required>
            @else
                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
            @endif
        @else
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        @endif

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

@if(isset($user))
    @if(isset($editpass))
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    @endif
@endif

