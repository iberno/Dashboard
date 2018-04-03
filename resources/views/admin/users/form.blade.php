<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Name</label>

    <div class="col-md-6">
        {{-- <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus> --}}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}

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
        {{-- <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required> --}}
        {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">Password</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control" name="password" >

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
    </div>
</div>
 <?php
    $rol = (isset($user)) ? $user->roles->pluck('name')->toArray() : [];
?>
<div class="form-group">
    @foreach ($roles as $key => $value)
    <div class="col-md-3">
        <label for="role-{{ $key }}" class=" control-label"> 
                <input type="checkbox" id="role-{{$key}}" onclick="checked" name="roles[]" class="the-role" value="{{$key}}" @if(in_array($key, $rol)) checked @endif>
                {{ $key }}
        </label>
    </div>
    @endforeach
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Register
        </button>
    </div>
</div>