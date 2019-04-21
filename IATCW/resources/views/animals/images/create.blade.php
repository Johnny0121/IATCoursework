@extends('layouts.default')
@section('content')
<div class="container">
  <div class="container-form">
    <h1>Add a new image for {{$animal['name']}}</h1>

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

    <form class="" action="{{action('ImageController@store', $animal['id'])}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title">Animal ID</label>
          <input class="field-input" type="text" name="animalid" value="{{$animal['id']}}" placeholder="" readonly>
        </div>
        <div class="form-input-pair">
          <label class="field-title">Name</label>
          <input class="field-input" type="text" name="name" value="{{$animal['name']}}" placeholder="" readonly>
        </div>
      </div>
      <div class="form-row">

        <div class="form-input-pair form-input-pair-password">
          <label class="field-title">New image</label>
          <input class="field-input" type="file" name="image" value="" placeholder="" required>
        </div>
      </div>

      <!-- Submit -->
      <div class="form-row">
        <div class="form-submit">
          <input type="submit" name="" value="Submit image">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
