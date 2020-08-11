<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" >
</head>
<body>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>