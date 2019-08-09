@extends('layouts.app_2')

@section('content')
<div class="container">
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Register an Account</div>
    <div class="card-body">
      <form method="post" name="register" action="{{route('register') }}">
        {{csrf_field()}}
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="firstName" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="firstName" placeholder="First name" required="required" autofocus="autofocus">
                <label for="firstName">First name</label>
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="lastName" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" placeholder="Last name" name="lastName" required="required">
                <label for="lastName">Last name</label>
                @if ($errors->has('lastName'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('lastName') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email address" required="required">
            <label for="email">Email address</label>
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Confirm password" required="required">
                <label for="password-confirm">Confirm password</label>
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-primary btn-block" type="submit" >Register</button>
      </form>
      <div class="text-center">
        <a class="d-block small mt-3" href="{{ route('login') }}">Login Page</a>
        <a class="d-block small" href="{{ route('password.request') }}">Forgot Password?</a>
      </div>
    </div>
  </div>
</div>
@endsection
