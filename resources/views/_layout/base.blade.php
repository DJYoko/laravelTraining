<html>
<head>
@include('_layout.head')</head>
<body>
@include('_layout.header')</head>
@yield('content')
<div class="container">
</div>
    @include('_layout.footer')
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@yield('js')
</html>
