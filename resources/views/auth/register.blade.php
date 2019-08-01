<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
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
</form>
<style>
.red{
    color:"f66"
}</style>
</body>
</html>
