<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('apilogin') }}" method="post">
        @crsf
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        First name: <input type="text" name="fname"><br>
        <input type="text" name="content"><br>
        <input type="submit">
    </form>
    <h1>Ini login APIasadas</h1>
</body>
</html>