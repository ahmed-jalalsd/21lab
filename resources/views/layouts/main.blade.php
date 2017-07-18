<!DOCTYPE html>
<html lang="en">
<head>
  @include('inc.header')
</head>
  <body>
  @include('inc.nav')
    <div class="container">
    @yield('content')
    @include('inc.footer')
    </div>
    @include('inc.javascript')
    @yield('scripts')
  </body>
</html>
