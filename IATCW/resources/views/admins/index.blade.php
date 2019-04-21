@extends('layouts.default')
@section('content')
<div class="container">
  <div class="admin-index">
    <h1 class="header header-main">Welcome to the Admin Dashboard</h1>
    <p>From here, you can do <em>admin stuff</em> like what admins typically do</p>
    <div class="container-buttons-actions">
      <a href="{{ route('animals.create') }}">Register a new animal</a>
      <a href="{{ route('animals.index') }}">List animals</a>
      <a href="{{ url('adoptions') }}">Show adoptions</a>
      <a href="{{ route('adoptionrequests.index') }}">View adoption requests</a>
    </div>
    <div class="container-display">
      <div class="pending-requests">
        <h1 class="header header-sub">Pending Adoption Requests</h1>

        @if ($errors->any())
        <div class="invalid-feedback">
          <ul>
            @foreach ($errors as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <table>
          <thead class="thead thead-display">
            <tr class="thead-row">
              <td><strong>Request ID</strong></td>
              <td colspan="2"><strong>User ID</strong></td>
              <td colspan="2"><strong>Animal ID</strong></td>
              <td><strong>Request creation date</strong></td>
              <td><strong>State of Request</strong></td>
              <td colspan="3"><strong>Action</Strong></td>
            </tr>
          </thead>
          <tbody>
            @foreach ($adoptionrequests as $adoptionrequest)
            <tr>
              <td>{{$adoptionrequest['id']}}</td>
              <td>{{$adoptionrequest['userid']}}</td>
              <td>
                <a href="#">Details</a>
              </td>
              <td>{{$adoptionrequest['animalid']}}</td>
              <td>
                <a href="#">Details</a>
              </td>
              <td>{{$adoptionrequest['created_at']}}</td>
              <td>{{$adoptionrequest['state']}}</td>
              <td>
                <a href="{{action('AdoptionRequestController@edit', $adoptionrequest['id'])}}">Edit</a>
              </td>
              <td>
                <form class="" action="{{action('AdoptionRequestController@approveAdoptionRequest', $adoptionrequest['id'])}}" method="post">
                  @csrf
                  <input type="hidden" name="" value="PUT">
                  <button class="form-btn-approved" type="submit" name="button">Approve</button>
                </form>
              </td>
              <td>
                <form class="" action="{{action('AdoptionRequestController@rejectAdoptionRequest', $adoptionrequest['id'])}}" method="post">
                  @csrf
                  <input type="hidden" name="" value="PUT">
                  <button class="form-btn-delete" type="submit" name="button">Reject</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        @if(count($adoptionrequests) <= 0)
          <p class="alert-error">No pending adoption requests to display</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
