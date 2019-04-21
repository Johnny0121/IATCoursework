@extends('layouts.default')
@section('content')
<div class="container">
  <div class="container-display">
    <h1>Adoption Request List</h1>
    <p>A list of all adoption requests made by users</p>
    <table>
      <thead class="thead thead-display">
        <tr class="thead-row">
          <td><strong>Request ID</strong></td>
          <td colspan="2"><strong>User ID</strong></td>
          <td colspan="2"><strong>Animal ID</strong></td>
          <td><strong>Request creation date</strong></td>
          <td><strong>State of Request</strong></td>

          @if (Auth::guard('admin')->check())
          <td colspan="2"><strong>Action</strong></td>
          @endif

        </tr>
      </thead>
      <tbody>
        @foreach ($adoptionrequests as $adoptionrequest)
        <tr>
          <td>{{$adoptionrequest['id']}}</td>
          <td>{{$adoptionrequest['userid']}}</td>
          <td>
            <a href="{{action('UserController@show', $adoptionrequest['userid'])}}">Details</a>
          </td>
          <td>{{$adoptionrequest['animalid']}}</td>
          <td>
            <a href="{{action('AnimalController@show', $adoptionrequest['animalid'])}}">Details</a>
          </td>
          <td>{{$adoptionrequest['created_at']}}</td>
          <td
            @if($adoptionrequest['state'] == 'approved')
              class="approved"
            @elseif($adoptionrequest['state'] == 'rejected')
              class="pending"
            @elseif($adoptionrequest['state'] == 'pending')
              class="rejected"
            @endif
          >
            {{$adoptionrequest['state']}}
          </td>

          @if(Auth::guard('admin')->check())
            <td>
              <a href="{{action('AdoptionRequestController@edit', $adoptionrequest['id'])}}">Edit</a>
            </td>
            <td>
              <form class="" action="{{action('AdoptionRequestController@destroy', $adoptionrequest['id'])}}" method="post">
                @csrf
                <input type="hidden" name="" value="DELETE">
                <button class="form-btn-delete" type="button" name="button">Delete</button>
              </form>
            </td>
          @endif

        </tr>
      </tbody>
      @endforeach
    </table>

    @if(count($adoptionrequests) <= 0)
      <p class="alert-error">Unfortunately, no adoption requests have been created yet.</p>
    @endif
  </div>

  <div class="container-buttons-actions">
    @if(Auth::guard('admin')->check())
      <a href="{{ route('admin.dashboard') }}" role="button">Back to admin page</a>
    @else
      <a href="{{ route('users.index') }}" role="button">Back to user page</a>
    @endif
  </div>

</div>
@endsection
