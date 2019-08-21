@extends('_layout.base')
@section('css')
<style>
.red{
    color:"f66"
}</style>
<title>Register</title>
@endsection
@section('content')
<div class="container">
    <h1>Register</h1>
    <form action="/auth/register" method="post">
    {{csrf_field()}}
    <div class="list-group">
        <div class="list-group-item">
            user name
            <input type="text" name="name" size="30">
            <span class="red">{{ $errors->first('name')}}</span>
        </div>

        <div class="list-group-item">
            email
            <input type="text" name="email" size="30">
            <span class="red">{{ $errors->first('email')}}</span>
        </div>

        <div class="list-group-item">
            password
            <input type="text" name="password" size="30">
            <span class="red">{{ $errors->first('password')}}</span>
        </div>

        <div class="list-group-item">
            password confirmation
            <input type="text" name="password_confirmation" size="30">
            <span class="red">{{ $errors->first('password_confirmation')}}</span>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" value="send" class="btn btn-primary">Register</button>
    </div>
</div>
@endsection
