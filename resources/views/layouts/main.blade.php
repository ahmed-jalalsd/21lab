<!DOCTYPE html>
<html lang="en">
<head>
  @include('inc.header')
</head>
  <body>
  @include('inc.nav')
  @include('inc.backend-sidebar')
    <div class="container">
      {{ Auth::check() ? "logged in" : "logged out" }}
      @yield('content')
      @include('inc.footer')
    </div>
    @include('inc.javascript')
    @yield('scripts')

  </body>
</html>
