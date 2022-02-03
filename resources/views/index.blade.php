@extends('_layout.base')
@section('css')
@endsection

@section('content')
<div class="container py-5">
  <h1>トップページ</h1>
  @include('parts.circleList', ['_circles' => $circles])
  <p><a href="{{ route('circle.index')}}">すべてのサークル</a></p>
</div>
@endsection

@section('js')
@endsection
