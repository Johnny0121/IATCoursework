@extends('layouts.default')
@section('content')
<div class="container">
  <div class="container-form">
    <h1>ADOPTION REQUEST FORM</h1>
    <p>Please fill out the <span style="color: rgb(244, 100, 95);">description box</span> below and click on <span style="color: rgb(244, 100, 95);">Request for Adoption</span>!</p>
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

    <form class="form-adoptionrequest" action="{{ url('adoptionrequests') }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="image-container image-bordered">
          <img class="show-image" style="width: 100%; height: 100%;" src="{{ asset('storage/images/'.$animal->image) }}" alt="No image given">
      </div>

      <br>

      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title" >Your User ID</label>
          <input class="field-input" type="number" name="userid" value="{{Auth::user()->id}}" readonly required>
        </div>
        <div class="form-input-pair">
          <label class="field-title" >Animal ID</label>
          <input class="field-input" type="number" name="animalid" value="{{$animal['id']}}" readonly required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title" >Animal Name</label>
          <input class="field-input" type="text" name="animalname" value="{{$animal['name']}}" disabled required>
        </div>
        <div class="form-input-pair">
          <label class="field-title" >Animal</label>
          <input class="field-input" type="text" name="animalanimal" value="{{$animal['animal']}}" disabled required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title" >Description</label>
          <label class="form-caption">Tell us why you would want to adopt this animal!</label>
          <textarea class="field-input" name="description" rows="6" cols="80" autofocus></textarea>
        </div>
      </div>

      <div class="form-row form-submit">
        <input class="" type="submit" name="" value="Request for Adoption">
      </div>
    </form>
  </div>

  <div class="container-buttons-actions">
    <a href="{{action('AnimalController@show', $animal['id'])}}" role="button">Back to animal details</a>
    <a href="{{ route('home') }}" role="button">Back to user page</a>
  </div>
</div>
@endsection
