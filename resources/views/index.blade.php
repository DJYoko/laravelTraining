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
    </li>
@endforeach
</ul>
</div>
@endsection

@section('js')
@endsection
