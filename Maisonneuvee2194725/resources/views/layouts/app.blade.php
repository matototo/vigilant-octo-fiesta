<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <!-- lenks -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      @import "functions";
      @import "variables";
      @import "variables-dark";

      /* customize primary dark */
      $primary: #001199;

      [data-bs-theme="dark"] {
      --bs-primary: #{$primary};
      --bs-primary-bg-subtle: #{$primary};
      --bs-primary-bg-subtle-dark: #{$primary};
  
      .btn-primary {
      --bs-btn-bg: #{$primary};
  }
}
    </style>
</head>
<body>
  @php
    $locale = session()->get('locale')
  @endphp
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <div class="container-fluid p-0">
    <header class="d-flex justify-content-between py-3 px-0">
      <ul class="nav nav-pills">
        <li><a href="/" class="nav-link px-2 link-secondary">@lang('lang.home')</a></li>
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
              aria-expanded="false">Menu</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('student.create') }}">@lang('lang.student_new')</a></li>
            <li><a class="dropdown-item" aria-current="page" href="{{ route('student.index') }}">@lang('lang.student_list')</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
              aria-expanded="false">@lang('lang.users')</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('user.create') }}">@lang('lang.user_new')</a></li>
              <li><a class="dropdown-item" href="{{route('user.index')}}">@lang('lang.user_list')</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav nav-pills mb-2 mb-sm-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                aria-expanded="false">@lang('lang.language') {{ $locale == '' ? '' : "($locale)" }}</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('lang', 'en') }}">@lang('lang.language_en')</a></li>
                <li><a class="dropdown-item" href="{{ route('lang', 'fr') }}">@lang('lang.language_fr')</a></li>
            </ul>
        </li>
        <li class="nav-item">
            @guest
            <a class="nav-link" href="{{ route('login') }}">@lang('lang.login')</a>
            @else
            <a class="nav-link" href="{{ route('logout') }}">@lang('lang.logout')</a>
            @endguest
        </li>
      </ul>
    </header>
    <div class="container-fluid d-flex justify-content-end">
            <button class="btn btn-dark shadow" id="btnSwitch">@lang('lang.mode')</button>
      </div>
  </div>

    @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @yield('content')

    



  <footer class="mt-auto">
    
      <span class="mb-3 mb-md-0 text-body-secondary">&copy; {{ date('Y') }} {{ config('app.name') }} // @lang('lang.rights')</span>
    </div>
  </footer>
    </div>
</body>
    <!-- screps -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
      document.getElementById('btnSwitch').addEventListener('click',()=>{
      if (document.documentElement.getAttribute('data-bs-theme') == 'dark') {
          document.documentElement.setAttribute('data-bs-theme','light')
      }
      else {
          document.documentElement.setAttribute('data-bs-theme','dark')
      }
      })
    </script>
</html>