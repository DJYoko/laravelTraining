@extends('_layout.base')
@section('css')
@endsection

@section('content')
<div class="container p-circleUpdate">
<h1>サークル登録</h1>

@if(isset($messages))
<div class="alert alert-danger">
    @foreach($messages as $message)
    <div>{{ $message}}</div>
    @endforeach
</div>
@endif
<form action="{{route('circle.update.save', ['circlePath' => $circle['path']])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>サークル名<input name="circleName" value="{{$circle['name']}}"></div>
    <div>説明<input name="circleDescription" value="{{$circle['description']}}"></div>
    <div>URL<input name="circlePath" value="{{$circle['path']}}"></div>
    <div>アイコン画像
        <label
            for="circleImage"
            class="p-circleUpdate-circleThumbnail"
            @if($circle->thumbnail_path)
                style="background-image:url({{config( 'constants.CIRCLE_IMAGE_STORAGE_DIRECTORY' ) . $circle->thumbnail_path}});"
            @endif
        ></label>
        <input type="file" name="circleImage" id="circleImage" value="">
    </div>
    <a type="submit" href="{{route('circle.detail', ['circlePath' => $circle['path']])}}">キャンセル</a>
    <button type="submit">送信</button>
</form>
</div>
@endsection

@section('js')
@endsection
