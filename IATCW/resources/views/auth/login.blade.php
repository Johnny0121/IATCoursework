@extends('layouts.default')

@section('content')
<div class="login">
  <h1>LOGIN</h1>

  @if ($errors->any())
  <div class="invalid-feedback">
    <ul>
      @foreach ($errors->all() as $error)
      <li class=""><strong>{{$error}}</strong></li>
      @endforeach
    </ul>
  </div>
  @endif

  <form class="" action="{{ route('login') }}" method="post">
    @csrf

    <input class="login" type="text" name="email" value="" placeholder="Username or Email" required autofocus>

    <input class="login" type="password" name="password" value="" placeholder="Password" required>

    <div class="login-hyper">
      <div class="login-remember">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">{{ __('Remember Me') }}
      </div>

      <div class="login-forgot">
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">Forgot Password?</a>
        @endif
      </div>
      </label>
    </div>
    <button type="submit" name="btnLogin">{{ __('Login') }}</button>
    <a class="login-admin-login" href="{{ route('admin.login') }}">Admin login</a>
  </form>
</div>
@stop
