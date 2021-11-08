@extends('_layout.base')
@section('css')
@endsection

@section('content')
<div class="container">
<h1>ログインしました</h1>
    <ul>
        <li><a href="{{route('member.update.input')}}">プロフィール編集</a></li>
        <li><a href="{{route('circle.create.input')}}">サークル登録</a></li>
    </ul>
    <h2>参加しているサークル</h2>
    @include('parts.circleList', ['_circles' => $myCircles])

</div>
@endsection

@section('js')
@endsection
