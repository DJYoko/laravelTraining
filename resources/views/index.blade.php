@extends('_layout.base')

@section('content')
<div class="container py-5">
  <h1>{{ __('Top') }}</h1>
  @include('parts.circleList', ['_circles' => $circles])
  <p><a href="{{ route('circle.index')}}">{{__('allCircle')}}</a></p>
</div>
@endsection

@section('js')
@endsection
