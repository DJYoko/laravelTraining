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
        <p><a href="{{route('circle.update.input', ['circlePath' => $circle->path] )}}">内容を編集する</a></p>
    @endif
    <h2>メンバー</h2>
    <ul>
        @foreach ($members as $member)
            <li>
                <p>name: {{$member->name}}</p>
                {{-- <p>link: <a href="{{route('member.detail', ['memberPath' => $member->path])}}">{{route('member.detail', ['circlePath' => $circle->path])}}</a></p> --}}
            </li>
        @endforeach
        </ul>
    </div>
@endsection

@section('js')
@endsection
