@extends('layouts.default')
@section('content')
<div class="container">
  <h1 class="header header-main">Images of <span style="color: rgb(244, 100, 95);">{{$animalimages['animal']['name']}}</span></h1>
  <h2>Animal ID - {{$animalimages['animal']['id']}}</h2>
  <div class="container-display">
    <div class="image-container image-bordered">
      <label>Main image</label>
      <img class="show-image" style="width: 100%; height: 100%;" src="{{asset('storage/images/'.$animalimages['animal']['image'])}}" alt="No image given">
    </div>

    <a class="btn-add-image" href="{{action('ImageController@addNewImage', $animalimages['animal']['id'])}}">Add image</a>


    <div class="container-section">

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

      <h1 style="margin: 0px 0px 30px 0px;" class="header header-sub">More images of {{$animalimages['animal']['name']}}</h1>
      <div class="container-multi-images">
        <!-- ADD FOREACH -->
        @foreach($animalimages['images'] as $image)
        <div class="container-multi-image">
          <img class="show-image" style="width: 100%;" src="{{asset('storage/images/'.$image['image'])}}" alt="No image given">
          <a href="{{action('ImageController@removeImage', $image['id'])}}">Remove image</a>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="container-buttons-actions">
    <a href="{{action('AnimalController@show', $animalimages['animal']['id'])}}">Return to animal details</a>
  </div>
</div>
@endsection('content')
