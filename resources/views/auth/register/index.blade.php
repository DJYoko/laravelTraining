@extends('_layout.base')
@section('css')
  <style>
    .red {
      color: "f66"
    }

  </style>
  <title>{{ __('Register') }}</title>
@endsection
@section('content')
  <div class="container">
    <h1>{{ __('Register') }}</h1>
    <form action="/auth/register" method="post">
      {{ csrf_field() }}
      <div class="list-group">
        <div class="list-group-item">
          {{ __('UserName') }}
          <input type="text" name="name" size="30" value="{{ old('name') }}">
          @if (!empty($errors->first('name')))
            <p class="alert alert-danger">{{ $errors->first('name') }}</p>
          @endif
        </div>

        <div class="list-group-item">
          {{ __('Email') }}
          <input type="text" name="email" size="30" value="{{ old('email') }}">
          @if (!empty($errors->first('email')))
            <p class="alert alert-danger">{{ $errors->first('email') }}</p>
          @endif
        </div>

        <div class="list-group-item">
          {{ __('Password') }}
          <input type="text" name="password" size="30">
          @if (!empty($errors->first('password')))
            <p class="alert alert-danger">{{ $errors->first('password') }}</p>
          @endif
        </div>

        <div class="list-group-item">
          {{ __('PasswordConfirmation') }}
          <input type="text" name="password_confirmation" size="30">
          @if (!empty($errors->first('password_confirmation')))
            <p class="alert alert-danger">{{ $errors->first('password_confirmation') }}</p>
          @endif
        </div>
      </div>
      <div class="text-center">
        <button type="submit" value="send" class="btn btn-primary">{{ __('Register') }}</button>
      </div>
      <div id="react-registerForm" data-csrf-token="{{ csrf_token() }}" data-action-url="{{ route('register') }}"
        data-name="{{ old('name') }}" data-email="{{ old('email') }}"
        data-error-messages="@include('parts.errorMessagesJson', ['displayErrors' => $errors->getMessages()])">
      </div>
    </form>
  </div>
@endsection
@section('js')
  <script src="{{ mix('js/page/auth/register/index.js') }}"></script>
@endsection
