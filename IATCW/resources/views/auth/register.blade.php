@extends('layouts.default')

@section('content')
<div class="register">
  <div class="container-form">
    <h1>ACCOUNT REGISTRATION</h1>

    @if($errors->any())
    <div class="errors alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li><strong>{{$error}}</strong></li>
        @endforeach
      </ul>
    </div>
    <br>
    @endif

    <!-- 2 Inputs per row (2 form-elements per row) -->
    <form class="" action="{{ route('register') }}" method="post">
      @csrf

      <!-- Firstname & Lastname -->
      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title">First Name</label>
          <input class="field-input" type="text" name="forename" value="" placeholder="" required autofocus>
        </div>
        <div class="form-input-pair">
          <label class="field-title">Last Name</label>
          <input class="field-input" type="text" name="surname" value="" placeholder="" required>
        </div>
      </div>

      <!-- Gender & DateofBirth -->
      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title">Gender</label>
          <select id="dropGender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="prefer_not_to_say">Prefer not to say</option>
            <option value="apache_attack_helicopter">Apache Attack Helicopter</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="form-input-pair">
          <label class="field-title">Telephone</label>
          <input class="field-input" type="number" name="telephone" value="" placeholder="" required>
        </div>
      </div>

      <!-- Email & telephone -->
      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title">Email Address</label>
          <input class="field-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="" placeholder="" required>
        </div>
        <!--
        <div class="dob">
          <label>Date of Birth (optional)</label>
          <input class="field-input" type="date" name="date_of_birth" value="">
          @if ($errors->has('date_of_birth'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('date_of_birth') }}</strong>
              </span>
          @endif
        </div>-->
      </div>

      <!-- Username & password -->
        <!--
        <div class="username">
          <label>Username</label>
          <input class="field-input" type="text" name="username" value="" placeholder="" required>
          @if ($errors->has('username'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('username') }}</strong>
              </span>
          @endif
        </div>
      -->
      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title">Password</label>
          <input class="field-input" type="password" name="password" value="" placeholder="" required>
        </div>

        <div class="form-input-pair form-input-pair-password">
          <label class="field-title">Confirm Password</label>
          <input class="field-input" type="password" name="password_confirmation" value="" placeholder="" required>
        </div>
      </div>

      <!-- Submit -->
      <div class="form-row">
        <div class="form-submit">
          <input id="btnRegister" type="submit" name="" value="REGISTER">
        </div>
      </div>

      <div class="form-row">
        <div class="register-existing-account">
          <p>Aleady have an account?</p>
          <a href="{{ route('login') }}">Login now!</a>
        </div>
      </div>

    </form>
  </div>
  </div>
</div>
@stop
