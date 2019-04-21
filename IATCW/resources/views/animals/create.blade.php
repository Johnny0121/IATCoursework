@extends('layouts.default')
@section('content')
<div class="container">
  <div class="container-form">
    <h1>REGISTER NEW ANIMAL</h1>
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
    <form class="form-animal" action="{{ route('animals.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <!-- ROW: Animal-name, Animal-->
      <div class="form-row">
        <div class="form-input-pair tool-tip">
          <label class="field-title" >Given name</label>
          <input class="field-input" type="text" name="name" value="" required>
        </div>
        <div class="form-input-pair">
          <label class="field-title" >Animal</label>
          <input class="field-input" type="text" name="animal" value="" required>
        </div>
      </div>

      <!-- ROW: Type/Breed, DOB -->
      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title" >Type/Breed</label>
          <input class="field-input" type="text" name="type" value="" required>
        </div>
        <div class="form-input-pair">
          <label class="field-title" >Date of Birth</label>
          <input class="field-input" type="date" name="date_of_birth" value="" required>
        </div>
      </div>

      <div class="form-row form-checkbox">
        <div class="field-checkbox-pair">
          <label>Microchipped</label>
          <select class="" name="microchipped">
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
          <!-- <input id="microchipped" class="checkbox" type="checkbox" name="microchipped" value="1">
          <input id="microchippedHidden" class="checkbox" type="hidden" name="microchipped" value="0"> -->
        </div>
        <div class="field-checkbox-pair">
          <label>Vaccinated</label>
          <select class="" name="vaccinated">
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
          <label class="field-title" >Availability</label>
          <select class="" name="availability" required>
            <option selected="selected" style="background-color: green;" value="1">Available</option>
            <option style="background-color: red;" value="0">Unavailable</option>
          </select>
        </div>
      </div>

      <!-- Description row -->
      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title" >Description</label>
          <textarea name="description" rows="8" cols="80"></textarea>
        </div>
      </div>

      <div class="form-row">
        <div class="form-input-pair">
          <label for="file" class="field-title" >Upload image</label>
          <input class="field-input inputfile" type="file" name="image" value="">
        </div>
      </div>

      <div class="form-row form-submit">
        <input class="" type="submit" name="" value="Add Animal">
      </div>
    </form>
  </div>

  <div class="container-buttons-actions">
    <a href="{{ route('admin.dashboard') }}" role="button">Back to admin page</a>
  </div>

</div>
@endsection
