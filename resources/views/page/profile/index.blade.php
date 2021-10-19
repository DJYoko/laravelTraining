@extends('_layout.base')
@section('css')
@endsection

@section('content')
<div class="container">
<h1>プロフィール編集</h1>
    <form action="{{route('profile.edit')}}" method="POST">
        @csrf
        名前<input name="userName" value="{{ \Auth::user()->name}}">
        <button type="submit">送信</button>
    </form>
</div>
@endsection

@section('js')
@endsection
