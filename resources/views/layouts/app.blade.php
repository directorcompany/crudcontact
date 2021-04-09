<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
         <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
    integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
</script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
</script>

<style>
    .container.content { 
    padding-top: 19px;
    }
    #sticky-footer {
  flex-shrink: none;
  position: fixed;
  bottom: 0;
  height: 10%;
  width: 100%;
   text-align: center;
}

</style>
    </head>
    <body class="font-sans antialiased">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary py-4">
      <div>
      <a class="navbar-brand" href="/">Navbar</a>
      <div class="pull-right">
        Logout
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">><i class="lnr lnr-exit"></i><span>Выйти </span></a></li>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
														@csrf
													</form>
      </div>

    </nav>
  </div>
    @section('sidebar')

@show

<div class="container content">
    @yield('content')
</div>
<footer id="sticky-footer" class="bg-primary">
    <div class="container text-center">
      
    </div>
  </footer>

    </body>
</html>
