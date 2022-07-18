@extends('_layout.base', ['title' => $userName . ' | ' . 'メンバー詳細'])

@section('content')
<div class="container py-5 p-memberDetail">
  <h1>{{$userName}}</h1>
  @if($isOwner)
  <a class="p-memberDetail__editLink" href="{{route('member.update.input')}}">編集</a>
  @endif
  <div class="form-group mt-5">
    <div class="p-memberDetail-memberThumbnail" @if(isset($thumbnailPath)) style="background-image:url({{$thumbnailPath}});" @endif></div>
  </div>

  <div class="form-group mt-5">
    <h2>{{__('CirclesThatTheUserTakesPartIn', ['userName' => $userName ])}}</h2>
    @include('parts.circleList', ['_circles' => $targetCircles])
  </div>

</div>
@endsection

@section('js')
@endsection
