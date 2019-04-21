@extends('layouts.default')
@section('content')
<div class="container">
  <div class="container-form">
    <h1>Adoption Request Details</h1>
    <h2 style="color: rgb(244, 100, 95);">Adoption Request ID - {{$adoptionrequest['id']}}</h2>
    <p>Change the <span style="color: rgb(244, 100, 95);">state of request</span> by selecting an option below. Other fields cannot be edited.</p>
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

    <form class="" action="{{action('AdoptionRequestController@update', $adoptionrequest['id'])}}" enctype="multipart/form-data" method="post">
      @method('PATCH')
      @csrf

      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title" >User ID</label class="field-title" >
          <input class="field-input" type="text" name="userid" value="{{$adoptionrequest['userid']}}" readonly required>
        </div>
        <div class="form-input-pair">
          <label class="field-title" >Animal ID</label class="field-title" >
          <input class="field-input" type="text" name="animalid" value="{{$adoptionrequest['userid']}}" readonly required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title" >Description</label class="field-title" >
          <textarea name="description" rows="8" cols="80" readonly></textarea>
        </div>
      </div>

      <div class="form-row">
        <div class="form-input-pair">
          <label class="field-title" >State of Request</label>
          <select class="" name="state" value="{{$adoptionrequest['state']}}" required>
            <option @if($adoptionrequest['state'] == 'pending') selected="selected" @endif value="pending">Pending</option>
            <option @if($adoptionrequest['state'] == 'approved') selected="selected" @endif value="approved">Approved</option>
            <option @if($adoptionrequest['state'] == 'rejected') selected="selected" @endif value="rejected">Rejected</option>
          </select>
        </div>
      </div>

      <div class="form-row form-submit">
        <input class="" type="submit" name="" value="Update request">
      </div>
    </form>
  </div>

  <div class="container-buttons-actions">
    <a href="{{ route('admin.dashboard') }}" role="button">Back to admin page</a>
    <a href="{{ route('adoptionrequests.index') }}" role="button">Back to adoption request list</a>
  </div>

</div>
@endsection
