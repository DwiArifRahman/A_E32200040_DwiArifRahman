@extends('backend/layouts.login')
@section('content')
<form class="login-form" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="login-wrap">
      <p class="login-img"><i class="icon_lock_alt"></i></p>
      <div class="input-group">
        <span class="input-group-addon"><i class="icon_profile"></i></span>
        <input placeholder="Email" id="email" type="email" class="form-control" @error('email') is-invalid @enderror>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="input-group">
        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
        <input type="password" class="form-control" placeholder="Password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
      </div>
      <label class="checkbox">
              <input type="checkbox" value="remember-me" name="remember" id="remember"
                {{ old('remember') ? 'checked' : ''}}> Remember me
              <span class="pull-right"> <a href="{{ route('password.request') }}"> Forgot Password?</a></span>
          </label>
      <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
      <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>
    </div>
  </form>
@endsection