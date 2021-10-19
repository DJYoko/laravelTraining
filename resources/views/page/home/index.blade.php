@extends('_layout.base')
@section('css')
@endsection

@section('content')
<div class="container">
<h1>ログインしました</h1>
    <ul>
        <li><a href="{{route('profile.detail')}}">プロフィール編集</a></li>
        <li>サークル作成</li>
    </ul>
</div>
@endsection

@section('js')
@endsection
