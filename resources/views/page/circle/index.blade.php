@extends('_layout.base')
@section('css')
@endsection

@section('content')
<div class="container py-5">
  <h1>サークル一覧</h1>
  @include('parts.circleList', ['_circles' => $circles])
</div>
@endsection

@section('js')
@endsection
