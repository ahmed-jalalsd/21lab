<!DOCTYPE html>
<html lang="en">
<head>
  @include('inc.front-header')
  @yield('stylesheets')
</head>
 <body>
 	@yield('content')

    @include('inc.front-footer')
    @include('inc.front-js')
    
    @yield('scripts')

  </body>
</html>