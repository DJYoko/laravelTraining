<html lang="{{ app()->getLocale() }}">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('css')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  @include('_layout.head')
</head>

<body>
  @include('_layout.header')</head>
  @yield('content')
  <div class="container">
  </div>
  @include('_layout.footer')
</body>
@yield('js')

</html>
