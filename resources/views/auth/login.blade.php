@extends('layouts.app_2')

@section('content')
<div class="container">
  <div class="card card-login mx-auto mt-5">
    <div class="card-header">Login</div>
    <div class="card-body">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email address" required="required" autofocus="autofocus"
            name="email">
            <label for="email">Email address</label>
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required="required">
            <label for="password">Password</label>
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <div class="checkbox">
            <label for="remember">
              <input type="checkbox" name="remember" value="remember-me" id="remember"{{old('remember') ? 'checked' : '' }}>
              Remember Password
            </label>
          </div>
        </div>
        <button class="btn btn-primary btn-block" type="submit">Login</button>
      </form>
      <div class="text-center">
        <a class="d-block small mt-3" href="{{ route('register') }}">Register an Account</a>
        @if (Route::has('password.request'))
        <a class="d-block small" href="{{ route('password.request') }}">Forgot Password?</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
