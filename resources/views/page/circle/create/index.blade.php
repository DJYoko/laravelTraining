@extends('_layout.base')
@section('css')
@endsection

@section('content')
<div class="container">
<h1>サークル登録</h1>

<div class="alert alert-danger">
    @foreach($messages as $message)
    <div>{{ $message}}</div>
    @endforeach
</div>
<form action="{{route('circle.create.save')}}" method="POST">
    @csrf
    <div>サークル名<input name="circleName" value=""></div>
    <div>URL<input name="circlePath" value=""></div>
    <button type="submit">送信</button>
</form>
</div>
@endsection

@section('js')
@endsection
