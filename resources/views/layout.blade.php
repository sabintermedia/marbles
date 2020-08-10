<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') @ Marbles</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/cover.css') }}" rel="stylesheet">


    </head>
    <body class="text-center h-auto">

      <div class="cover-container d-flex h-100 p-3 mb-5 flex-column">
        <header class="masthead mb-auto">
          <div class="inner">
            <h1 class="masthead-brand"><a href="/">Marbles</a></h1>
            <nav class="nav nav-masthead justify-content-center">
              <a class="nav-link" href="/playgame">Play</a>
              <a class="nav-link" href="/history">History</a>
              <a class="nav-link" href="/settings">Settings</a>
            </nav>
          </div>
        </header>

        <main role="main" class="outer cover mb-auto mt-3 ">
          @yield ('welcome')
          @yield ('play')
          @yield ('settings')
          @yield ('editsettings')
          @yield ('history')
          @yield ('distribute')
        </main>
        <div>
          <footer class="mastfoot">
              <div class="inner">
                <p>Developed by Sebastian Blajevici @ <a href="https://www.sabintermedia.ro"> SAB Intermedia</a><br/>
                  for <a href="https://www.bit-soft.ro/">BITSOFT</a><br/>
                  with <a href="https://laravel.com/docs/7.x/releases">Laravel 7</a>, <a href="https://getbootstrap.com/">Bootstrap</a>, <a href="https://www.apachefriends.org/ro/index.html">XAMPP</a><br/>
                  and cover template by <a href="https://twitter.com/mdo">@mdo</a>

                </p>
              </div>
          </footer>
        </div>
      </div>


      <script src="https://unpkg.com/turbolinks"></script>
    </body>
</html>
