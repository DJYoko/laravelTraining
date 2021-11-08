@extends('_layout.base')
@section('css')
@endsection

@section('content')
<div class="container p-profileDetail">
<h1>プロフィール編集</h1>
    <form action="{{route('profile.edit')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="username">表示名</label>
            <input type="text" class="form-control" id="username" aria-describedby="userNameHelp" placeholder="表示名" name="userName" value="{{ \Auth::user()->name}}">
            <small id="userNameHelp" class="form-text text-muted">表示される名前を入力します</small>
        </div>

        <div class="form-group">
            <label for="profileImage">アイコン画像</label>
            <label for="profileImage" class="p-profileDetail-memberThumbnail"
                @if(isset(Auth::user()->thumbnail_path))
                style="background-image:url({{config( 'constants.USER_PROFILE_IMAGE_STORAGE_DIRECTORY' )}}{{ Auth::user()->thumbnail_path}});"
                @endif
            ></label>
            <input type="file" id="profileImage" name="profileImage">
            <small id="profileImageHelp" class="form-text text-muted">表示される画像を登録します</small>

        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">送信</button>
        </div>

    </form>
</div>
@endsection

@section('js')
@endsection
