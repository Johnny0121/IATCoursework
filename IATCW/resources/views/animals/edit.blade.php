@extends('layouts.default')
@section('content')
<div class="container">
  <div class="container-form">
    <h1>UPDATE EXISTING ANIMAL</h1>
    <h2 style="color: rgb(244, 100, 95);">Animal ID - {{$animal['id']}}</h2>
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

    <!-- DISPLAY FORM -->
    <form class="form-animal" action="{{ action('AnimalController@update', $animal['id']) }}" method="post" enctype="multipart/form-data">
      @method('PATCH')
      @csrf
      <!-- ROW: Animal-name, Animal-->
      <div class="form-row">
        <div class="form-input-pair tool-tip">
          <label class="field-title" >Given name</label class="field-title" >
          <input class="field-input" type="text" name="name" value="{{$animal->name}}" required>
        </div>
        <div class="form-input-pair">
          <label class="field-title" >Animal</label class="field-title" >
          <input class="field-input" type="text" name="animal" value="{{$animal->animal}}" required>
        </div>
      </div>

      <!-- ROW: Type/Breed, DOB -->
      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title" >Type/Breed</label class="field-title" >
          <input class="field-input" type="text" name="type" value="{{$animal->type}}" required>
        </div>
        <div class="form-input-pair">
          <label class="field-title" >Date of Birth</label class="field-title" >
          <input class="field-input" type="date" name="date_of_birth" value="{{$animal->date_of_birth}}" required>
        </div>
      </div>

      <div class="form-row form-checkbox">
        <div class="field-checkbox-pair">
          <label>Microchipped</label>
          <select class="" name="microchipped" value="{{$animal->microchipped}}">
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
          <!-- <input id="microchipped" class="checkbox" type="checkbox" name="microchipped" value="1">
          <input id="microchippedHidden" class="checkbox" type="hidden" name="microchipped" value="0"> -->
        </div>
        <div class="field-checkbox-pair">
          <label>Vaccinated</label>
          <select class="" name="vaccinated" value="{{$animal->vaccinated}}">
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
          <!-- <input id="vaccinated" class="checkbox" type="checkbox" name="vaccinated" value="1">
          <input id="vaccinatedHidden" class="checkbox" type="hidden" name="vaccinated" value="0"> -->
        </div>
      </div>

      <!-- ROW: Single elem: Availability-->
      <div class="form-row">
        <div class="form-input-pair animals-create-availability-input-pair">
          <label class="field-title" >Availability</label class="field-title">
          <select class="" name="availability" value="{{$animal->availability}}" required>
            <option @if ($animal['availability'] == '1') selected="selected" @endif style="background-color: green;" value="1">Available</option>
            <option @if ($animal['availability'] == '0') selected="selected" @endif style="background-color: red;" value="0">Unavailable</option>
          </select>
        </div>
      </div>

      <!-- Description row -->
      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title" >Description</label class="field-title" >
          <textarea name="description" rows="8" cols="80">{{$animal->description}}</textarea>
        </div>
      </div>

      <div class="form-row">
        <div class="form-input-pair">
          <label for="file" class="field-title" >Upload image</label class="field-title" >
          <input class="field-input inputfile" type="file" name="image" value="">
        </div>
      </div>

      <div class="form-submit">
        <input class="" type="submit" name="" value="Update Animal">
        <input type="reset" name="" value="Reset">
      </div>
    </form>
  </div>

  <div class="container-buttons-actions">
    <a href="{{ action('AnimalController@show', $animal['id']) }}" role="button">Back to animal detail</a>
    <a href="{{ route('animals.index') }}" role="button">Return to animal list</a>
    @if(Auth::guard('admin'))
      <a href="{{ route('admin.dashboard') }}" role="button">Back to admin page</a>
    @else
      <a href="{{ route('home') }}" role="button">Back to user page</a>
    @endif
  </div>

</div>
@endsection
