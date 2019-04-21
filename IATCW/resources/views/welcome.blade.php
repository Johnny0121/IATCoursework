@extends('layouts.default')

@section('content')
<div class="home">
  <div class="home-1">
    <h1>Adopt an animal friend today</h1>
    <p>Help us protect some of the world's most vulnerable animals by becoming an Aston Adopter from just 10p a month today.</p>
    <p>Choose from a wide selection of animals in need of your adoption and help save the planet.</p>
    <div class="home-images">
      <div class="home-img-1">
        <img src="{{ asset('storage/images/animals/panda_cub.jpg') }}" alt="Panda and Cub!">
      </div>
      <div class="home-img-2">
        <img src="{{ asset('storage/images/animals/red_panda.jpg') }}" alt="Red Panda!">
      </div>
    </div>
  </div>

  <div class="home-2">
    <h1>Protect UK wildlife and give our animals a home</h1>
    <p>Money raised from our adoption schemes goes to helping important local wildlife conservation work, <br />such as managing nature reserves or creating new habitats. <br>They also make the perfect gift for a nature lover!</p>
    <br />
    <p>Check out below for a list of animals you may wish to save today!</p>
    <div class="home-2-animals">
      <div id="main-2-1"><p>Good Doggo</p></div>
      <div id="main-2-2"><p>Overrated Sheep</p></div>
      <div id="main-2-3"><p>Dolphin</p></div>
      <div id="main-2-4"><p>XD Mufasa ded</p></div>
      <div id="main-2-5"><p>Pingu</p></div>
      <div id="main-2-6"><p>A Cow</p></div>
      <div id="main-2-7"><p>A Duck</p></div>
      <div id="main-2-8"><p>A hedgedog</p></div>
      <div id="main-2-9"><p>3 Monkeys. You can't buy them separately.</p></div>
    </div>
  </div>

  <div class="home-4">
    <div class="container-column-split">
      <div class="container-col-split-left">
        <h1>Adopt as much as you want.</h1>
        <h2>Find a new home for our animals.</h1>
        <p>Aston Animal Sanctuary is a global conservation organisation dedicated to reversing these trends by protecting the natural environment and the animals that depend on it. When you adopt an animal with AAS you are helping to fund their vital conservation work by making a regular payment from just 10p a month</p>
        <div class="container-col-split-inner">
          <div class="container-col-split-col-1">
            <p>100%</p>
            <p>Satisfaction</p>
          </div>
          <div class="container-col-split-col-2">
            <p>0</p>
            <p>Adoptions made</p>
          </div>
          <div class="container-col-split-col-3">
            <p>100%</p>
            <p>Totally legit</p>
          </div>
        </div>
      </div>
      <div class="container-col-split-right">
        <img src="{{asset('storage/images/photographs/girl-rabbit-polaroid.jpg')}}" alt="No image set yet">
      </div>
    </div>
  </div>

  <div class="home-3">
    <h1>Become a part of a loving community and join us.</h1>

    <!-- Buttons -->
    <!-- <div >
      <a id="home-btn-1" href="{{route('users.index')}}">Adopt an animal</a>
      <a id="home-btn-2" href="{{route('register')}}">Become a member</a>
      <button id="home-btn-1" type="button" name="btnAdopt" href="#">Adopt an Animal</button>
      <button id="home-btn-2" type="button" name="btnRegister" href="{{ route('register') }}">Become a member</button>
    </div> -->

    <div class="container-buttons-actions">
      <a id="home-btn-1" href="{{route('users.index')}}">Adopt an animal</a>
      <a id="home-btn-2" href="{{route('register')}}">Become a member</a>
    </div>

    <!-- Content -->
    <div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <br>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    </div>
  </div>

  <!-- REVIEWS -->
  <div class="home-5">
    <div class="container-review">
      <div class="container-review-col">
        <p>"I've changed so many animals' lives by adopting."</p>
        <p>- My friend</p>
      </div>
      <div class="container-review-col">
        <p>"Mate, it's only 10 pence for an adoption. Do the right thing"</p>
        <p>- My other friend</p>
      </div>
      <div class="container-review-col">
        <p>"10/10 Would visit again"</p>
        <p>- My other other friend</p>
      </div>
    </div>
  </div>
</div>
@stop
