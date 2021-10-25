@extends('_layout.base')
@section('css')
@endsection

@section('content')
<div class="container">
<h1>トップページ</h1>
<ul>
@foreach ($circles as $circle)
    <li>
        <p>name: {{$circle->name}}</p>
        <p>link: <a href="{{route('circle.detail', ['circlePath' => $circle->path])}}">{{route('circle.detail', ['circlePath' => $circle->path])}}</a></p>
    </li>
@endforeach
</ul>
<p><a href="{{ route('circle.index')}}">すべてのサークル</a></p>
</div>
@endsection

@section('js')
@endsection
