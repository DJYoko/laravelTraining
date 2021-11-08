@extends('_layout.base')
@section('css')
@endsection

@section('content')
    <div class="container">
    @if(!is_null($circle))
        <div class="row">
            <div class="col-md-9">
                <h1>{{$circle->name}}</h1>
            </div>
            <div class="col-md-3">
                @if($isEditable)
                <p><a href="{{route('circle.update.input', ['circlePath' => $circle->path] )}}">サークル情報編集</a></p>
                @endif
            </div>
        </div>
        <p>{{$circle->description}}</p>
    @endif

    <h2>メンバー</h2>
    <div class="p-memberList">
        @foreach ($members as $member)
            <div class="p-memberList__member"
                @if(isset($member->thumbnail_path))
                style="background-image:url({{config( 'constants.MEMBER_IMAGE_STORAGE_DIRECTORY' )}}{{ $member->thumbnail_path}});"
                @endif
            >
                <a class="p-memberList__memberLink">
                    <div class="p-memberList__memberName">name: {{$member->name}}</div>
                </a>
            </div>
        @endforeach
        </div>
    </div>
@endsection

@section('js')
@endsection
