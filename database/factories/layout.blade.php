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

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/cover.css') }}" rel="stylesheet">


    </head>
    <body class="text-center">

      <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
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

        <main role="main" class="inner cover mb-auto">
          @yield ('welcome')
          @yield ('board')
          @yield ('settings')
          @yield ('editsettings')
          @yield ('history')
        </main>

        <footer class="mastfoot">
          <div class="inner">
            <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
          </div>
        </footer>
      </div>

    </body>
</html>
