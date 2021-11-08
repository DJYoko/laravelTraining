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
    <div>サークル名<input name="circleName" value=""></div>
    <div>説明<input name="circleDescription" value=""></div>
    <div>URL<input name="circlePath" value=""></div>
    <div>アイコン画像<input type="file" name="circleImage" value=""></div>
    <button type="submit">送信</button>
</form>
</div>
@endsection

@section('js')
@endsection
