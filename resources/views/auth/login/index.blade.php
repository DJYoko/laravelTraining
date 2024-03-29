@extends('_layout.base', ['title' => __('Login')])
@section('content')
<div class="container py-5">
  <h1 class="h1 mb-3">{{ __('Login') }}</h1>
  @if ($errors->any())
  <div class="alert alert-danger" dusk="loginPageAlert">
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
  </div>
  @endif
  <div class="list-group">
    <div class="list-group-item">
      <div id="react-loginForm" data-csrf-token="{{ csrf_token() }}" data-action-url="{{ route('login') }}">
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{ mix('js/page/auth/login/index.js') }}"></script>
@endsection
