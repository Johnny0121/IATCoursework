@extends('layouts.default')
@section('content')
<div class="container">
  <h1 class="title title-name">Hi {{Auth::user()->forename}},</h1>
  <h1 class='title title-dashboard'>Welcome to the User Dashboard</h1>

  <div class="container-buttons-actions">
    <a href="{{ route('animals.showAvailableAnimals') }}">List animals</a>
    <a href="{{action('AdoptionRequestController@index')}}">View my adoption requests</a>
    <a href="{{action('UserController@edit', Auth::user()->id)}}">Edit my user details</a>
  </div>
  <div class="container-section">
    <div class="">
      <h1>Animals available to adopt!</h1>
      <div class="animals">
        <table>
          <thead>
            <tr>
              <td><strong>Animal ID</strong></td>
              <td><strong>Name</strong></td>
              <td><strong>Animal</strong></td>
              <td><strong>Type/Breed</strong></td>
              <td><strong>Date of Birth</strong></td>
              <td><strong>Availability</strong></td>
              <td colspan="2"><strong>Action</strong></td>
            </tr>
          </thead>
          <tbody>
            @foreach ($animals as $animal)
            <tr>
              <td>{{$animal['id']}}</td>
              <td>{{$animal['name']}}</td>
              <td>{{$animal['animal']}}</td>
              <td>{{$animal['type']}}</td>
              <td>{{$animal['date_of_birth']}}</td>
              <td>{{$animal['availability']}}</td>
              <td>
                <a href="{{action('AnimalController@show', $animal['id'])}}">Details</a>
              </td>
              <td>
                <a href="{{action('AdoptionRequestController@makeadoptionrequest', $animal['id'])}}">Request for adoption</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        @if(count($animals) <= 0)
          <p class="alert-error">Unfortunately, there are no available animals to adopt at the moment.</p>
        @endif
      </div>
    </div>
  </div>

</div>
@endsection
