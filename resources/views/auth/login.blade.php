@extends('_layout.base')
@section('css')
<style>
.red{
    color:"f66"
}</style>
<title>{{__('Login')}}</title>
@endsection
@section('content')
<div class="container">
    <h1>{{__('Login')}}</h1>
    @isset($message)
        <p class="red">
            {{$message}}
        </p>
    @endisset
    <form action="/auth/login" method="post">
        {{csrf_field()}}
        <div class="list-group mb-2">
            <div class="list-group-item">
                {{__('Email')}}
                <input type="text" name="email" size="30">
            </div>

            <div class="list-group-item">
                {{__('Password')}}
                <input type="text" name="password" size="30">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" value="send" class="btn btn-primary">{{__('Login')}}</button>
        </div>
    </form>
</div>
@endsection
