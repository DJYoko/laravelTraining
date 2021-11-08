@extends('_layout.base')
@section('css')
@endsection

@section('content')
    <div class="container">
    @if(!is_null($circle))
        <h1>{{$circle->name}}</h1>
        <p>{{$circle->description}}</p>
        <p>{{$circle->thumbnail_path}}</p>
    @endif
    @if($isEditable)
        <p><a href="{{route('circle.update.input', ['circlePath' => $circle->path] )}}">サークル情報編集</a></p>
    @endif
    <h2>メンバー</h2>
    <div class="p-memberList">
        @foreach ($members as $member)
            <div class="p-memberList__member"
                @if(isset($member->thumbnail_path))
                style="background-image:url({{config( 'constants.USER_PROFILE_IMAGE_STORAGE_DIRECTORY' )}}{{ $member->thumbnail_path}});"
                @endif
                >
                <a class="p-memberList__memberLink">
                    <div class="p-memberList__memberName">name: {{$member->name}}</div>

                    {{-- <p>link: <a href="{{route('member.detail', ['memberPath' => $member->path])}}">{{route('member.detail', ['circlePath' => $circle->path])}}</a></p> --}}
                </a>
            </div>
        @endforeach
        </div>
    </div>
@endsection

@section('js')
@endsection
