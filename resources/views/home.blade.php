<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Home</h1>
        @if(Auth::check())
        Hello {{ \Auth::user()->name}}
        @else
            Guest User | <a href="/auth/register"></a>
        @endif
        <p></p>
    </div>
</body>
</html>
