@extends('_layout.base')
@section('css')
<style>
.red{
    color:"f66"
}</style>
<title>Login</title>
@endsection
@section('content')
<div class="container">
    <h1>login</h1>
    @isset($message)
        <p class="red">
            {{$message}}
        </p>
    @endisset
    <form action="/auth/login" method="post">
        {{csrf_field()}}
        <div class="list-group">
            <div class="list-group-item">
                email
                <input type="text" name="email" size="30">
            </div>

            <div class="list-group-item">
                password
                <input type="text" name="password" size="30">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" value="send" class="btn btn-primary">login</button>
        </div>
    </form>
</div>
@endsection
