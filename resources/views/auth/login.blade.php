<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
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
<style>
.red{
    color:"f66"
}</style>
</body>
</html>
