@extends('_layout.base')
@section('css')
<title>{{ __('Register') }}</title>
@endsection
@section('content')
<div class="container">
  <h1 class="h1 mb-3">{{ __('Register') }}</h1>
  <div class="list-group">
    <div class="list-group-item">
      <div id="react-registerForm" data-csrf-token="{{ csrf_token() }}" data-action-url="{{ route('register') }}"
        data-name="{{ old('name') }}" data-email="{{ old('email') }}"
        data-error-messages="@include('parts.errorMessagesJson', ['displayErrors' => $errors->getMessages()])">
      </div>
    </div>

  </div>
</div>
@endsection
@section('js')
<script src="{{ mix('js/page/auth/register/index.js') }}"></script>
@endsection
