@extends('_layout.base')
@section('css')
@endsection

@section('content')
<div class="container">
<h1>サークル一覧</h1>
@include('parts.circleList', ['_circles' => $circles])
</div>
@endsection

@section('js')
@endsection
