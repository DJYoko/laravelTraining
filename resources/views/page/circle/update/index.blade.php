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
<form action="{{route('circle.update.save', ['circlePath' => $circle['path']])}}" method="POST">
    @csrf
    <div>サークル名<input name="circleName" value="{{$circle['name']}}"></div>
    <div>説明<input name="circleDescription" value="{{$circle['description']}}"></div>
    <div>URL<input name="circlePath" value="{{$circle['path']}}"></div>
    <a type="submit" href="{{route('circle.detail', ['circlePath' => $circle['path']])}}">キャンセル</a>
    <button type="submit">送信</button>
</form>
</div>
@endsection

@section('js')
@endsection
