@extends('_layout.base')
@section('css')
@endsection

@section('content')
<div class="container">
<h1>プロフィール編集</h1>
    <form action="{{route('profile.edit')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="username">表示名</label>
            <input type="text" class="form-control" id="username" aria-describedby="userNameHelp" placeholder="表示名" name="userName" value="{{ \Auth::user()->name}}">
            <small id="userNameHelp" class="form-text text-muted">表示される名前を入力します</small>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">送信</button>
        </div>


    </form>
</div>
@endsection

@section('js')
@endsection
