@extends('layouts.default')
@section('content')
<div class="container">
  <div class="container-display">
    <div class="container-header">
      <h1 class="header header-main">Animal details</h1>
    </div>
    <div class="container-header">
      <h2 class="header header-sub" style="color: rgb(244, 100, 95);">Animal ID - {{$animal['id']}}</h2>
    </div>

    <div class="animals">
      <div class="image-container image-bordered">
        <img class="show-image" style="width: 100%; height: 100%;" src="{{ asset('storage/images/'.$animal['image']) }}" alt="No image given">
      </div>
      <br>
      <table>
        <thead>
          <tr>
            <td><strong>Animal ID</strong></td>
            <td><strong>Name</strong></td>
            <td><strong>Animal</strong></td>
            <td><strong>Type/Breed</strong></td>
            <td><strong>Date of Birth</strong></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$animal['id']}}</td>
            <td>{{$animal['name']}}</td>
            <td>{{$animal['animal']}}</td>
            <td>{{$animal['type']}}</td>
            <td>{{$animal['date_of_birth']}}</td>
        </tbody>
      </table>

      <br>

      <table>
        <thead>
          <tr>
            <td><strong>Availability</strong></td>
            <td><strong>Microchipped</strong></td>
            <td><strong>Vaccinated</strong></td>
            @if(Auth::guard('admin')->check())
              <td colspan="3"><strong>Action</strong></td>
            @else
              <td colspan="2"><strong>Action</strong></td>
            @endif
          </tr>
        </thead>
        <tbody>
          <td>{{$animal['availability']}}</td>
          <td>{{$animal['microchipped']}}</td>
          <td>{{$animal['vaccinated']}}</td>
          <td>
            <a class="form-btn more-images" href="{{action('ImageController@show', $animal['id'])}}">More images</a>
          </td>
          @if(Auth::guard('admin')->check())
            <td>
              <a href="{{action('AnimalController@edit', $animal['id'])}}">Edit</a>
            </td>
            <td>
              <form class="" action="{{action('AnimalController@destroy', $animal['id'])}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button class="form-btn-delete" type="submit" name="button">Delete</button>
              </form>
            </td>
          @else
            <td>
              <a href="{{action('AdoptionRequestController@makeadoptionrequest', $animal['id'])}}">Request to adopt</a>
            </td>
          @endif

        </tr>
        </tbody>
      </table>

      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title">Description</label>
          <textarea class="" name="description" rows="8" cols="80" readonly>{{$animal['description']}}</textarea>
        </div>
      </div>
    </div>
  </div>

  <div class="container-buttons-actions">
    <a href="{{ route('animals.index') }}" role="button">Back to animal list</a>
    @if(Auth::guard('admin')->check())
      <a href="{{ route('admin.dashboard') }}" role="button">Back to admin page</a>
    @else
      <a href="{{ route('home') }}" role="button">Back to user page</a>
    @endif
  </div>

</div>
@endsection
