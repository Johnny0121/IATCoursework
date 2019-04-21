@extends('layouts.default')
@section('content')
<div class="container">
  <div class="container-display">
    <h1 class="header header-main">Animal List</h1>

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
            <!-- Admin ? 3 buttons (show, edit, destroy) : 2 buttons (show, make request) -->
            @if(Auth::guard('admin')->check())
              <td colspan="3"><strong>Action</strong></td>
            @else
              <td colspan="2"><strong>Action</strong></td>
            @endif

          </tr>
        </thead>
        <tbody>
          @foreach ($animals as $animal)
          <tr>
            <td>{{ $animal['id']}}</td>
            <td>{{$animal['name']}}</td>
            <td>{{$animal['animal']}}</td>
            <td>{{$animal['type']}}</td>
            <td>{{$animal['date_of_birth']}}</td>
            <td>{{$animal['availability']}}</td>
            <td>
              <a href="{{action('AnimalController@show', $animal['id'])}}">Details</a>
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
                <a href="{{action('AdoptionRequestController@makeadoptionrequest', $animal['id'])}}">Request for Adoption</a>
              </td>
            @endif

          </tr>
          @endforeach
        </tbody>
      </table>

      @if (count($animals) <= 0)
      <p class="alert-error">Unfortunately, there are no animals available.</p>
      @endif
    </div>
  </div>

  <!-- Form: filter by animal type -->
  <div class="container-section">
    <h1 class="header header-main">Filter by animal type</h1>
    <form class="" action="{{action('AnimalController@filterByType')}}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="form-row">
        <div class="form-checkbox-pair">
          <label class="field-title"></label>
          <select style="width: 325px; height: 2em;" class="" name="animal">
            <option value="monkey">Monkey</option>
            <option value="horse">Horse</option>
            <option value="lion">Lion</option>
            <option value="penguin">Penguin</option>
            <option value="rabbit">Rabbit</option>
            <option value="hedgehog">Hedgehog</option>
            <option value="fox">Fox</option>
            <option value="dolphin">Dolphin</option>
            <option value="panda">Panda</option>
            <option value="cow">Cow</option>
            <option value="duck">Duck</option>
            <option value="alpaca">Alpaca</option>
            <option value="sheep">Sheep</option>
            <option value="turtle">Turtle</option>
            <option value="frog">Frog</option>
          </select>
        </div>
      </div>

      <div style="width: 40%;" class="form-row form-submit">
        <input class="" type="submit" name="" value="Filter">
      </div>
    </form>

    <a class="btn-show-all-animals" href="{{route('animals.index')}}">Show all animals</a>
  </div>

  @if(!(Auth::guard('admin')->check()))
  <div class="container-section">
    <h2>Want to make an adoption request?</h2>
    <p>You can do so by selecting the details of an animal you wish to consider to adopt, then click on <span style="color: rgb(244, 100, 95);">adopt</span></p>
  </div>
  @endif


  <div class="container-buttons-actions">
    @if(Auth::guard('admin')->check())
      <a href="{{ route('admin.dashboard') }}" role="button">Back to admin page</a>
    @else
      <a href="{{ route('users.index') }}" role="button">Back to user page</a>
    @endif
  </div>

</div>
@endsection
