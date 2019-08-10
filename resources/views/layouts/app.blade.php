<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    @yield('styles')

    <title>Belfer</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('index') }}">Belfer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class='navbar-nav mr-auto'>
            @if (Auth::user())
                @php
                  $role = auth()->user()->role()->first()->name;                    
                @endphp
            @else
              @php
                  $role = null;
              @endphp
            @endif
            @switch($role)
                @case('admin')
                    <li class='nav-item'><a href="{{ route('admin.school.index') }}" class='nav-link'>Szkoły</a></li>
                    @break
                @default 
            @endswitch
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              @guest
                <a class="nav-link" href="{{ route('login') }}">Zaloguj się</a>                  
              @else
                <form action="{{ route('logout') }}" method='POST'>
                  @csrf
                  <button type='submit' class='btn nav-link'>
                    Wyloguj się
                  </button>
                </form>                  
              @endguest
            </li>
          </ul>
        </div>
      </nav>

    <main class='py-4'>

        <div class="container">
          <div class='row'>
            <div class='col col-lg-8 col-md-12' style='margin: 0 auto;'>
              @yield('content')
            </div>
          </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('scripts')
  </body>
</html>