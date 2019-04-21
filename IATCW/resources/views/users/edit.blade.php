@extends('layouts.default')
@section('content')
<div class="container">
  <div class="container-form">
    <h1>Edit details for {{$user['forename']}}</h1>

    <!-- DISPLAY ERRORS -->
    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="invalid-feedback">
          @foreach($errors as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      <br>
    @endif

    <!-- DISPLAY SUCCESS -->
    @if(\Session::has('success'))
    <div class="alert alert-success">
      <p>{{ \Session::get('success') }}</p>
    </div>
    @endif

    <form class="" action="{{action('UserController@update', $user['id'])}}" method="post">
      @method('PATCH')
      @csrf

      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title">User ID</label>
          <input type="text" name="id" value="{{$user['id']}}" readonly>
        </div>
      </div>

      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title">Forename</label>
          <input type="text" name="forename" value="{{$user['forename']}}" title="Between 3-20 characters long, alphabetical" pattern="^[a-zA-Z0-9_\-]{3,20}$">
        </div>
        <div class="form-input-pair">
          <label class="field-title">Surname</label>
          <input type="text" name="surname" value="{{$user['surname']}}" title="Between 3-20 characters long, alphabetical" pattern="^[a-zA-Z0-9_\-]{3,20}$">
        </div>
      </div>

      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title">Email</label>
          <!-- Type Email RegEx: /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/ -->
          <input type="email" name="email" value="{{$user['email']}}">
        </div>
      </div>

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
          <input class="field-input" type="number" name="telephone" value="{{$user['telephone']}}" title="Minimum of 10 numbers" pattern="[0-9]{10,}" placeholder="" required>
        </div>
      </div>

      <!-- Submit -->
      <div class="form-row">
        <div class="form-submit">
          <input type="submit" name="" value="Update details">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
