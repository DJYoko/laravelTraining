@extends('_layout.base')
@section('content')
<div class="container">
    <h1>Home</h1>
    @if(Auth::check())
        Hello {{ \Auth::user()->name}}
        @include('votes.createForm')
    @else
        Guest User | <a href="/auth/register"></a>
    @endif

</div>
@endsection
@section('js')
<script>
$(function(){
    console.log('a');
});</script>
@endsection
