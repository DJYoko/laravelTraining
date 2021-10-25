@extends('_layout.base')
@section('css')
@endsection

@section('content')
<div class="container">

@if(!is_null($circle))
<h1>{{$circle->name}}</h1>
<p>{{$circle->description}}</p>
<p>{{$circle->thumbnail_path}}</p>
@else
<p>該当のサークルはありません</p>
@endif

</div>
@endsection

@section('js')
@endsection
