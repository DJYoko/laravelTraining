@extends('_layout.base')
@section('css')
  <style>
    .red {
      color: "f66"
    }

  </style>
  <title>{{ __('Login') }}</title>
@endsection
@section('content')
  <div class="container">
    <h1>{{ __('Login') }}</h1>
    @if ($errors->any())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif
    <div id="react-loginForm" data-csrf-token="{{ csrf_token() }}" data-action-url="{{ route('login') }}">
      {{-- React build test --}}
    </div>
  </div>
@endsection
@section('js')
  <script src="{{ mix('js/page/auth/login/index.js') }}"></script>
@endsection
