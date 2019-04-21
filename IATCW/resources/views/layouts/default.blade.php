<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <script src="{{ URL::asset('js/admins/index.js') }}"></script>
  </head>
  <body>
    <nav class="row">
      @include('includes.navigation')
    </nav>

    <div id="main" class="row">
      @yield('content')
    </div>

    <footer class="row">
      @include('includes.footer')
    </footer>
  </body>
</html>
