@extends('_layout.base')
@section('css')
@endsection

@section('content')
<div class="container">
<h1>サークル登録</h1>

@if(isset($messages))
<div class="alert alert-danger">
    @foreach($messages as $message)
    <div>{{ $message}}</div>
    @endforeach
</div>
@endif
<form action="{{route('circle.create.save')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="circleName">表示名</label>
        <input type="text" class="form-control" id="circleName" aria-describedby="circleNameHelp" placeholder="表示名" name="circleName" value="{{ \Auth::user()->name}}">
        <small id="circleNameHelp" class="form-text text-muted">表示されるサークル名を入力します</small>
    </div>
    <div class="form-group">
        <label for="circleDescription">説明</label>
        <input type="text" class="form-control" id="circleDescription" aria-describedby="circleDescriptionHelp" placeholder="表示名" name="circleDescription" value="{{ \Auth::user()->name}}">
        <small id="circleDescriptionHelp" class="form-text text-muted">サークル概要を入力します</small>
    </div>
    <div class="form-group">
        <label for="circlePath">URL</label>
        <input type="text" class="form-control" id="circlePath" aria-describedby="circlePathHelp" placeholder="表示名" name="circlePath" value="{{ \Auth::user()->name}}">
        <small id="circlePathHelp" class="form-text text-muted">当サイト内でのURLを入力します<br>例） http://????.com/circle/この部分</small>
    </div>
    <div class="form-group">
        <label for="circleImage">アイコン画像</label>
        <div>
            <input type="file" class="" id="circleImage" aria-describedby="circleImageHelp" placeholder="表示名" name="circleImage" value="{{ \Auth::user()->name}}">
        </div>
        <small id="circleImageHelp" class="form-text text-muted">アイコン画像を選択します</small>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">送信</button>
    </div>
</form>
</div>
@endsection

@section('js')
@endsection
