@extends('_layout.base')
@section('css')
@endsection

@section('content')
<div class="container">
<h1>サークル登録</h1>

<form action="{{route('circle.create.complete')}}" method="POST">
    @csrf
    <div>サークル名<input name="circleName" value=""></div>
    <div>URL<input name="circlePath" value=""></div>
    <button type="submit">送信</button>
</form>
</div>
@endsection

@section('js')
@endsection
