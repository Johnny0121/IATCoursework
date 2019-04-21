@extends('layouts.default')
@section('content')
<div class="container">
  <div class="container-display">
    <h1>List of animals and adoption status</h1>
    <div class="animals">
      <table>
        <thead>
          <tr>
            <td><strong>Animal ID</strong></td>
            <td><strong>Name</strong></td>
            <td><strong>Animal</strong></td>
            <td><strong>Availability</strong></td>
            <td colspan="1"><strong>Action</strong></td>
            <td><strong>Adopted</strong></td>
            <td><strong>Adopter ID</strong></td>
            <td><strong>Adopter Name</strong></td>
            <td colspan="1"><strong>Action</strong></td>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $adoption)
          <tr>
            <td>{{$adoption->animalid}}</td>
            <td>{{$adoption->name}}</td>
            <td>{{$adoption->animal}}</td>
            <td>{{$adoption->availability}}</td>
            <td>
              <a href="{{action('AnimalController@show', $adoption->animalid)}}">Details</a>
            </td>

            @if($adoption->state == 'approved')
              <td class="approved">Yes</td>
            @elseif($adoption->state == 'rejected' || $adoption->state == 'pending')
              <td class="rejected">No</td>
            @else
              <td></td>
            @endif
            <!-- <td
              @if($adoption->state == 'approved')
                class="approved" >Yes
              @elseif($adoption->state == 'rejected' || $adoption->state == 'pending')
                class="rejected >No
              @else
                >
              @endif
            </td> -->
            <td>{{$adoption->userid}}</td>
            <td>{{$adoption->forename}} {{$adoption->surname}}</td>
            <td>
              @if(isset($adoption->userid))
              <a href="#">Details</a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      @if(count($data) <= 0)
        <p>Unfortunately, there are no animals to show adoptions for</p>
      @endif
    </div>

    <div class="container-buttons-actions">
      <a href="{{ route('admin.dashboard') }}" role="button">Back to admin page</a>
    </div>
  </div>
</div>
@endsection
